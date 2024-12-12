'use strict'

function $(selector) {
  return document.querySelector(selector)
}

function find(el, selector) {
  let finded
  return (finded = el.querySelector(selector)) ? finded : null
}

function siblings(el) {
  const siblings = []
  for (let sibling of el.parentNode.children) {
    if (sibling !== el) {
      siblings.push(sibling)
    }
  }
  return siblings
}

const showAsideBtn = $('.show-side-btn')
const sidebar = $('.sidebar')
const wrapper = $('#wrapper')

showAsideBtn.addEventListener('click', function () {
  $(`#${this.dataset.show}`).classList.toggle('show-sidebar')
  wrapper.classList.toggle('fullwidth')
})

if (window.innerWidth < 767) {
  sidebar.classList.add('show-sidebar');
}

window.addEventListener('resize', function () {
  if (window.innerWidth > 767) {
    sidebar.classList.remove('show-sidebar')
  }
})



// dropdown menu in the side nav
var slideNavDropdowns = document.querySelectorAll('.sidebar-dropdown');

$('.sidebar .categories').addEventListener('click', function (event) {
  event.preventDefault();
  const item = event.target.closest('.has-dropdown');

  if (!item) {
    return;
  }

  item.classList.toggle('opened');

  const dropdown = find(item, '.sidebar-dropdown');


  if (dropdown) {
    dropdown.classList.toggle('active');
  }
});

$('.sidebar .close-aside').addEventListener('click', function () {
  $(`#${this.dataset.close}`).classList.add('show-sidebar');
  wrapper.classList.remove('margin');
});


slideNavDropdowns.forEach(dropdown => {
  dropdown.addEventListener('click', function (event) {
    event.stopPropagation(); 
  });
});