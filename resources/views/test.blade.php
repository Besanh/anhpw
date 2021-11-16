<form>
    <input id="f" name="fullname" />
    <input class="e" name="email" />
    <button type="button" onclick="onClick(this)">Submit</button>
    <div id="ok"></div>
</form>
<script type="text/javascript">
    function onClick($this) {
        var val = document.getElementById('f').value;
        console.log(val)
        if (val == '') {
            console.log('no input');
        } else {
            document.getElementById("ok").innerHTML = val;
        }
    }

</script>
