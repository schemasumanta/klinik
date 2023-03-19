<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt example</title>
        <style type="text/css">
          * {
    font-size: 12px;
    /*font-family: 'Times New Roman';*/
    font-family: 'Arial';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    margin-left: 2px;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 55px;
    max-width: 55px;
    word-break: break-all;
    margin-left: 2px;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
    margin-left: 5px;
}

.centered {
    text-align: center;
    align-content: center;
     margin-left: 2px;
}

.ticket {
    width: 200px;
    max-width: 200px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }


}
        </style>
    </head>
    <body>
      <?php foreach($cetak as $row){ ?>
        <div class="ticket">
            <!-- <img src="./logo.png" alt="Logo"> -->
               <img src="<?php echo base_url() ?>assets/img/logo_print.png" style=" margin-left: 10px;" >
            <p class="centered">RECEIPT PEMBAYARAN BEROBAT KLINIK BUNDA RINCHA
   
                <br><label style="font-size: 10px;  margin-left: 2px;">Jl.Pasir Berem, Desa.Jagabaya, Kec.Parungpanjang</label>
                <br></p>
                <th class="quantity">Nama Pasien :</th>
                <th class="description"><?php echo ucfirst($row->nama_pasien); ?></th>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Satuan</th>
                        <th class="description">Nama Obat</th>
                        <th class="price">Rp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">Pcs</td>
                        <td class="description">ARDUINO UNO R3</td>
                        <td class="price">2000</td>
                    </tr>
                    <tr>
                        <td class="quantity">Tablet</td>
                        <td class="description">JAVASCRIPT BOOK</td>
                        <td class="price">1000</td>
                    </tr>
                    <tr>
                        <td class="quantity">Botol</td>
                        <td class="description">STICKER PACK</td>
                        <td class="price">1500</td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price">2000</td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                <br><?php echo $row->alamat ?></p>
        </div>

      <?php } ?>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script>
    </body>
</html>

<script type="text/javascript">
  const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>