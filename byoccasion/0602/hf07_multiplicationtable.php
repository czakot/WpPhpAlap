<table>
    <thead>
        <tr>
            <td></td>
            <?php
                for($i = 1; $i <= 10; ++$i) {
                    echo "<td>".$i."</td>";
                }
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
    for($i = 1; $i <= 10; ++$i) {
        echo "<tr><td>$i</td>";
        for($j = 1; $j <= 10; ++$j) {
            echo "<td>".$i * $j."</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>