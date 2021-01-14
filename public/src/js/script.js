const navSet = {
    'top': {
        'elements': {
            'textLogout': document.getElementById('logout-option'),
            'aNavLogout': document.getElementById('nav-link-logout'),
            'formLogout': document.getElementById('logout-form'),

            'textLogin': document.getElementById('login-option'),
            'aNavLogin': document.getElementById('nav-link-login'),
            'formLogin': document.getElementById('login-form'),

            'textDashboard': document.getElementById('dashboard-option'),
            'aNavDashboard': document.getElementById('nav-link-dashboard'),
            'formDashboard': document.getElementById('dashboard-form'),
        }
    },
    'both': {
        'elements': {
            'allNavLinkItens': document.getElementsByClassName('nav-link')
        }
    }
}

const formSet = {
    'orders': {
        'elements': {
            'allOptionTags': document.getElementsByTagName('option')
        }
    }
}

const helperSet = {
    'preventDefault': function (event) { event.preventDefault() }
}

$(navSet.both.elements.allNavLinkItens).each(function (index, value)
{
    value.setAttribute('draggable', false)
    value.onselectstart = false

    value.addEventListener('mouseup', function ()
    {
        window.removeEventListener('mouseup', onDragEnd)
        window.removeEventListener('selectstart', disableSelect)
    })

    value.addEventListener('selectstart', helperSet.preventDefault)
})

//  navSet

if (navSet.top.elements.aNavLogout)
{
    navSet.top.elements.aNavLogout.addEventListener('click', helperSet.preventDefault)
}

if (navSet.top.elements.textLogout)
{
    navSet.top.elements.textLogout.addEventListener('click', function ()
    {
        navSet.top.elements.formLogout.submit()
    })
}

if (navSet.top.elements.textLogin)
{
    navSet.top.elements.textLogin.addEventListener('click', function ()
    {
        navSet.top.elements.formLogin.submit()
    })
}

$(function ()
{
    $('[data-toggle="tooltip"]').tooltip()
})

$(window).on('load', function ()
{
    $('#loading').addClass('hide');
})

$(document).ready(function() {
    $('#select-dishes').multiselect({
        'buttonWidth': '150px'
    });
});