<div class="delete">
<?php $note = $params['note'] ?? null; ?>
<?php if ($note) : ?>
  <ul>
    <li>Id: <?php echo (int) $notee['id'] ?> </li>
    <li>
      Tytuł: <?php echo $note['title'] ?>
    </li>
  <li>
    Opis: <?php echo $note['description'] ?>
  </li>
  <li>Utworzono: <?php echo $note['created'] ?> </li>
    <li>
    <a href="/">
      <button>Powrót do listy notatek</button>
    </a>
    </li>
    <li>
      <form action="/?action=delete&id=<?php echo (int) $note['id'] ?>" method="POST">
        <input type="text" name="id" value="<?php echo (int) $note['id'] ?>" hidden>
        <input type="submit" value="Usuń">
      </form>
      
    </li>
  </ul>
  <?php else : ?>
  <div>Brak notatki do wyświetlenia</div>
  <?php endif; ?>
</div>
