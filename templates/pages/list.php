<div>
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
        <b><?php echo $params['resultList'] ?? "" ?></b>