<script src="js/raktar.js"></script>
<h1>Raktár</h1>
<form action="?menu=raktarlista">
    Név: <input type="text" name="filter_name" id="filter_name">
    <button type="button" onclick="javascript: get_list();">Szűrés</button>
    <button type="button" onclick="$('#filter_name').val(''); get_list();">Szűrés törlése</button>
</form>
<a href="javascript: newItem();" title="Új raktár létrehozása"><i class="fas fa-edit"></i></a>

<div id="popup-form">
    <b>Új raktár felvitele</b>
    <form action="?menu=raktarlista">
        <input type="hidden" name="popup_id" id="popup_id" value="0">
        Azonosító: <input type="text" name="popup_azonosito" id="popup_azonosito">
        <br>
        <br>
        Név: <input type="text" name="popup_name" id="popup_name">
        <br>
        <br>
        <br>
        <button type="button" onclick="javascript: closePopup();">Bezárás</button>
        <button type="button" onclick="javascript: save();">Mentés</button>
    </form>
</div>

<div id="raktarlista"></div>
