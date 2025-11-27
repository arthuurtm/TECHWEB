const loading = document.getElementById('site_loading');
const elementsLogged = document.querySelectorAll('#reqLog');

function changeSitePage(src, title, focus = null, hide = null) {

    var iframe = document.getElementById('site_page');
    loading.classList.remove('hidden');
    loading.classList.add('active');
    iframe.src = `views/${src}`;
    iframe.title = title;

    iframe.onload = function () {
        loading.classList.add('hidden');
        loading.classList.remove('active');
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.text = `
            function changeSitePage(src, title, focus = false, hide = false) {
                window.parent.postMessage({ 
                    action: 'changeSitePage',
                    src: src, 
                    title: title, 
                    focus: focus,
                    hide: hide
                },'*');
                console.log("Solicitação enviada!");
            }

            function requestReloadTo(path) {
                window.parent.postMessage({ 
                    action: 'requestReload',
                    path: path
                },'*');
            }

            function changeSiteModal(src) {
                window.parent.postMessage({ 
                    action: 'changeSiteModal',
                    src: src,
                },'*');
            }
        `;
        iframe.contentDocument.body.appendChild(script);
    };
}

function changeSiteModal(src, close = false) {
    var iframe = document.getElementById('site_modal');
    if (!close) {
        iframe.src = src;
        iframe.onload = function () {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.text = `
                function closeModal() {
                    window.parent.postMessage(
                    { 
                        action: 'changeSiteModal',
                        src: null,
                        close: true
                    },
                    '*'
                );
                    console.log("Solicitação enviada!");
                }
            `;
            iframe.contentDocument.body.appendChild(script);
        };

    } else {
        iframe.src = '';
    }
}

function logoutUser() {
    sessionStorage.removeItem('logged');
    window.location.reload();
}

function requestReload(path) {
    if (!!path) {
        changeSiteModal(path)
    }
    window.location.reload();
}

window.addEventListener('message', function (event) {
    console.log("Mensagem recebida na página principal:", event.data);
    console.log(`Função "${event.data.action}" requisitada...`);
    if (event.data.action === 'changeSitePage') {
        changeSitePage(event.data.src, event.data.title, event.data.focus, event.data.hide);

    } else if (event.data.action === 'changeSiteModal') {
        changeSiteModal(event.data.src,  event.data.close);

    } else if (event.data.action === 'requestReload') {
        requestReload();

    } else {
        console.warn(`Função "${event.data.action}" desconhecida!`);
    }
});

changeSitePage('tela_inicio.html')