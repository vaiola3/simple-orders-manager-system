const logoutOption = document.getElementById('logout-option')
const itens = document.getElementsByClassName('nav-link')

/**
 * @returns {void}
 * @param {object} event 
 */

function disableSelect (event)
{
    event.preventDefault()
}

/**
 * @returns {void}
 * @param {void} 
 */

function onDragEnd()
{
    window.removeEventListener('mouseup', onDragEnd)
    window.removeEventListener('selectstart', disableSelect)
}

$(itens).each(function (index, value)
{
    value.setAttribute('draggable',false)
    value.onselectstart = false
    value.addEventListener('mouseup', onDragEnd)
    value.addEventListener('selectstart', disableSelect)
})

logoutOption.addEventListener('click', function ()
{
    document.getElementById('logout-form').submit()
    console.log('clicked')
})

$(function ()
{
    $('[data-toggle="tooltip"]').tooltip()
})