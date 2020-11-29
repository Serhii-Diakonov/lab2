function showCover() {
    let coverDiv = document.createElement('div');
    coverDiv.id = 'cover-div';
    document.body.style.overflowY = 'hidden';
    document.body.append(coverDiv);
}

function hideCover() {
    document.getElementById('cover-div').remove();
    document.body.style.overflowY = '';
}

function showPrompt() {
    showCover();
    let container = document.getElementById('prompt-form-container');
    // let form = document.getElementById('prompt-form');
    // form.text.value = '';

    function complete() {
        hideCover();
        container.style.display = 'none';
        document.onkeydown = null;
    }

    document.getElementById("exit").onclick = function() {
        complete();
    };

    document.onkeydown = function(e) {
        if (e.key == 'Escape') {
            complete();
        }
    };

    container.style.display = 'block';
    // form.elements.text.focus();
}

document.getElementById('show').onclick = function() {
    showPrompt();
};