(function (window, document) {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var radialNavBtnPrev = document.querySelector('.radial-nav-btn-prev');
    var radialNavBtnNext = document.querySelector('.radial-nav-btn-next');
    var mapHolder = document.querySelector('.mapholder');
    var footerElement = document.getElementById('footer');
    var radialNav = document.querySelector('.radial-nav');
    var radialNavUl = document.querySelector('.radial-nav ul');
    var navItemList = radialNavUl.querySelectorAll('.radial-nav-item');

    var navItemLength = navItemList.length;
    var activeIndices = [navItemLength - 2, navItemLength - 1, 0, 1, 2];
    var classNames = ['prev-2', 'prev-1', 'active', 'next-1', 'next-2'];

    // toggle navigation
    document.querySelectorAll('.radial-nav-ellipsis,.radial-nav-ellipsis2,.radial-nav-ellipsis3,.radial-nav-ellipsis4,.radial-nav-ellipsis5').forEach(function (btnToggleNavigation) {
      btnToggleNavigation.addEventListener('click', function (e) {
        e.preventDefault();

        radialNav.classList.toggle('active');
        if (mapHolder) {
          mapHolder.classList.toggle('opacity');
        }
        footerElement.classList.toggle('opacity');
      });
    });

    // prev
    radialNavBtnPrev.addEventListener('click', function (e) {
      e.preventDefault();

      var itemIndex;
      for (itemIndex = 0; itemIndex < 5; itemIndex++) {
        navItemList[activeIndices[itemIndex]].className = 'radial-nav-item';
      }

      // transform
      for (itemIndex = 0; itemIndex < 5; itemIndex++) {
        activeIndices[itemIndex] = (activeIndices[itemIndex] + 1) % navItemLength;
        navItemList[activeIndices[itemIndex]].classList.add('radial-nav-item-' + classNames[itemIndex]);
      }
    });

    // next
    radialNavBtnNext.addEventListener('click', function (e) {
      e.preventDefault();

      for (var itemIndex = 0; itemIndex < 5; itemIndex++) {
        navItemList[activeIndices[itemIndex]].className = 'radial-nav-item';
      }

      // transform
      for (var itemIndex = 0; itemIndex < 5; itemIndex++) {
        activeIndices[itemIndex] = (activeIndices[itemIndex] - 1 + navItemLength) % navItemLength;
        navItemList[activeIndices[itemIndex]].classList.add('radial-nav-item-' + classNames[itemIndex]);
      }
    });
  });
})(window, document);