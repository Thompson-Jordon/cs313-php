jQuery(document).ready(function($) {
   $(".clickable-row").click(function() {
       window.location = $(this).data("href");
   });
});


// workorder dropdowns
jQuery(document).ready(function() {
    $('#location').change(function() {
        var inputValue = $(this).val();
        alert("value in js " + inputValue);

        //use ajax to call php function
        $.post('dropdown.php', {dropdownValue: inputValue}, function(data) {
            let devices = JSON.parse(data);
            alert("your devices are " + devices);
        });
    });
});
