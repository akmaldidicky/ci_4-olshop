<script type="text/javascript" src="jquery.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#diskon').keyup(function() {
            // <!-- Ambil nilai bayar dan diskon !-->
            var bayar = parseInt($('#bayar').val());
            var diskon = parseInt($('#diskon').val());

            // <!-- Perhitungan bayar-(diskon/100 x bayar) !-->
            var total_bayar = bayar - (diskon / 100) * bayar;
            $('#Tbayar').val(total_bayar);
        });
    });
</script>

<table border="0" cellpadding="5" align="center">
    <form action="" method="post">
        <tr>
            <td>Total Bayar</td>
            <td> : </td>
            <td><input type="text" name="bayar" id="bayar" /> (dalam Rp)</td>
        </tr>
        <tr>
            <td>Diskon</td>
            <td> : </td>
            <td><input type="text" name="diskon" id="diskon" /> % </td>
        </tr>
        <tr>
            <td>Total Bayar (sesudah diskon)</td>
            <td> : </td>
            <td><input type="text" name="Tbayar" id="Tbayar" readonly="readonly" /> (dalam Rp)</td>
        </tr>
        </tr>
    </form>
</table>