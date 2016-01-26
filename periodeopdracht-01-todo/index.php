<?php
session_start();

function dump_var($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

if(!isset($_SESSION['tasks']))
{
	//als nog geen sessie variabele taken dan nieuwe lege array maken
	$tasks = array();
}
else
{
	$tasks = $_SESSION['tasks'];
}

//dump_var($tasks);

if(isset($_POST['addToDo']))
{
	//toevoegen van taak aan array tasks
	$newTask = $_POST['description'];
	
	$tasks[] = array("description"=>$newTask, "done"=>false);
}
else if(isset($_POST['deleteToDo']))
{
	//Verwijderen van taak van array tasks
	$deleteKey = $_POST['deleteToDo'];
	
	unset($tasks[$deleteKey]);
}
else if(isset($_POST['toggleToDo']))
{
	//toggelen van done status in array tasks
	$toggleKey = $_POST['toggleToDo'];

	$tasks[$toggleKey]['done'] = !$tasks[$toggleKey]['done'];
}

//dump_var($tasks);

$_SESSION['tasks'] = $tasks;

$toDo = false; //var voor in html
$done = false; //var voor in html

//maken array van to do en done
if(count($tasks > 0))
{
	$doneTasks = array();
	$toDoTasks = array();
	
	foreach($tasks as $nr => $task)
	{
		if($task["done"])
		{
			//toevoegen aan array van done
			$doneTasks[$nr] = $task["description"];
			$done = true;
		}
		else
		{
			//toevoegen aan array van to do
			$toDoTasks[$nr] = $task["description"];
			$toDo = true;
		}
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Todo App</title>
	<link rel="stylesheet" href="global.css">
</head>
<body>
	<h1>Todo app</h1>
	<!-- Nog te doen -->
	<?php if(count($tasks) > 0): ?>
		<h2>Nog te doen</h2>
		<?php if($toDo): ?>
			<ul>
			<?php foreach($toDoTasks as $nr => $task): ?>
				<li>
					<form action="index.php" method="POST">
						<button title="Status wijzigen" name="toggleToDo" value="<?= $nr ?>" class="status not-done"><?= $task ?></button>
						<button title="Verwijderen" name="deleteToDo" value="<?= $nr ?>">Verwijder</button>
					</form>
				</li>
			<?php endforeach ?>
			</ul>
		<?php else: ?>
			<p>Schouderklopje, alles is gedaan!</p>
		<?php endif ?>
		<!-- Klaar -->
		<h2>Done and done!</h2>
		<?php if($done): ?>
			<ul>
				<?php foreach($doneTasks as $nr => $task): ?>
					<li>
						<form action="index.php" method="POST">
							<button title="Status wijzigen" name="toggleToDo" value="<?= $nr ?>" class="status done"><?= $task ?></button>
							<button title="Verwijderen" name="deleteToDo" value="<?= $nr ?>">Verwijder</button>
						</form>
					</li>
				<?php endforeach ?>
			</ul>
		<?php else: ?>
			<p>Werk aan de winkel...</p>
		<?php endif ?>
	<?php else: ?>
		<p>Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?</p>
	<?php endif ?>
	<!-- Toevoegen -->
	<h1>Todo toevoegen</h1>
	<form action="index.php" method="POST">
		<ul>
			<li>
				<label for="description">Beschrijving: </label>
				<input type="text" id="description" name="description">
			</li>
		</ul>
		<input type="submit" name="addToDo" value="Toevoegen">
	</form>
</body>
</html>