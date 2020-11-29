let form = document.createElement('form');
form.method = 'GET';
form.id = 'redir';

function send(id, place) {
    form.action = place;
    form.innerHTML = '<input name="id" value="' + id + '">';
    document.body.append(form);
    form.submit();
}