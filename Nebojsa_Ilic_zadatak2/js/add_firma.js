<script>
$(document).ready(function ()
{
        $("#show_singup").click(function () {
showpopup();
    });
    $("#close_singup").click(function () {
        hidepopup();
    });
});

function showpopup()
{
        $("#singup_form").fadeIn();
        $("#singup_form").css({"visibility": "visible", "display": "block"});
}

function hidepopup()
{
        $("#singup_form").fadeOut();
        $("#singup_form").css({"visibility": "hidden", "display": "none"});
}
</script>