const navSet = {
    'top': {
        'elements': {
            'textLogout': document.getElementById('logout-option'),
            'aNavLogout': document.getElementById('nav-link-logout'),
            'formLogout': document.getElementById('logout-form'),
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

navSet.top.elements.aNavLogout.addEventListener('click', helperSet.preventDefault)

navSet.top.elements.textLogout.addEventListener('click', function ()
{
    navSet.top.elements.formLogout.submit()
})

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