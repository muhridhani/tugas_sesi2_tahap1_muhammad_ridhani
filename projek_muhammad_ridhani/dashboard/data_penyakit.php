    <h1><i class='bx bx-pie-chart-alt-2' ></i> data Penyakit</h1>
    <br><hr>


    <?php 
        $user =query("SELECT * FROM tb_rekammedis");
        $penyakit = array();
        foreach($user as $data){
            if ( !in_array($data['diagnosa'], $penyakit)) {
                array_push($penyakit, $data['diagnosa']);
            }
        }

    ?>

    <br>
    <center>
        <table cellpadding="10" cellspacing="0" style="width:50%; text-align:center; border-collapse: collapse; " >
            <tr>
                <th width="40%">Jenis Penyakit Diangosa</th>
            </tr>

            <?php foreach($penyakit as $row) : ?> 
                <tr>
                    <td><?= $row ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </center>

