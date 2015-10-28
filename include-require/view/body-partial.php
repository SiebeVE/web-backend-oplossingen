<body>
  <header>
    <nav>
      <ul class="cf">
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Nieuws</a></li>
        <li><a href="#">Info</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header>
  <h1>Oplossing include require</h1>
  <div class="cf">
    <?php foreach($artikels as $id => $artikel): ?>
    <article>
      <h2><?= $artikel["title"] ?></h2>
      <p><?= $artikel["text"] ?></p>
      <p>Tags: <?= $artikel["tags"] ?></p>
    </article>
    <?php endforeach ?>
  </div>