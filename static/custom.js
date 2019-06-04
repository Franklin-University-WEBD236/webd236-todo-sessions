function post(url) {
  $('<form method="post" action="' + url + '" />').appendTo(document.body).submit();
}

function get(url) {
  location.href=url;
  return false;
}
