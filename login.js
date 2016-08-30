//function to close the login div..
function close_login_div(ele)
{
    var div = ele.parentElement;
    div.style.display = "none";
}

//function to show the login div..
function show_login_div()
{
    var div = document.querySelector('div.main_log_in_back');
    div.style.display = "block";
}