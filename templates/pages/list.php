<div>
    <section>
        <div class="message">
            <?php
            if (!empty($params['error'])) {
                switch ($params['error']) {
                    case 'noteNotFound':
                        echo "Notatka o podanym ID nie została znaleziona.";
                        break;
                        case 'missingNoteId':
                            echo "Niepoprawny identyfikator notatki!";
                            break;
                }
            }

            ?>
            </div>
        <div class="message">
            <?php
            if (!empty($params['before'])) {
                switch ($params['before']) {
                    case 'created':
                        echo "Notatka została utworzona!";
                        break;
                    default:
                        echo "Błędny adres URL!";
                        break;
                }
            }
            ?>
            </div>
            <div class="tbl-header">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tytuł</th>
                            <th>Data</th>
                            <th>Opcje</th>   
                        </tr>
        </thead>
        </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                    <?php foreach ($params['notes'] ?? [] as $note) : ?>
                        <tr>
                            <td><?php echo (int) $note['id'] ?></td>
                            <td><?php echo ($note['title']) ?></td>
                            <td><?php echo $note['created'] ?></td>
                            <td><a href="/?action=show&id=<?php echo (int) $note['id'] ?>">Pokaż</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                    </div>
                    </section>
    </div>