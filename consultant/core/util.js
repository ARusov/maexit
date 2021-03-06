function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$.notifyDefaults({
    type: 'success',
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 2000,
    newest_on_top: true,
    mouse_over: "pause",
});

function l(value) {
    console.log(value);
}