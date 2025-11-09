// add loaded class to body
window.addEventListener("load", () => {
  document.body.classList.add("loaded");
});

/****************************************
testimonial section
****************************************/
const testimonial_box_swiper = new Swiper(".box-slider-container", {
  init: false,
  spaceBetween: 30,
  pagination: {
    el: ".box-slider-pagination",
    type: "bullets",
    bulletActiveClass: "box-slider-pagination-bullet-active bullet-active",
    bulletClass: "box-slider-pagination-bullet bullet",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    992: {
      slidesPerView: 3,
    },
  },
});

/****************************************
icon box slider section
****************************************/
const icon_box_swiper = new Swiper(".icon-box-slider-container", {
  init: false,
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".icon-box-slider-pagination",
    type: "bullets",
    bulletActiveClass: "icon-box-slider-pagination-bullet-active bullet-active",
    bulletClass: "icon-box-slider-pagination-bullet bullet",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    992: {
      slidesPerView: 3,
    },
  },
});

/****************************************
tab slider
****************************************/

const tab_slider = new Swiper(".tab-row", {
  enabled: false,
  breakpoints: {
    0: {
      slidesPerView: 1.8,
      slideToClickedSlide: true,
      slidesPerGroup: 1.8,
    },
    992: {
      slidesPerView: 2.2,
      centeredSlides: false,
      loop: false,
      spaceBetween: 30,
      slideToClickedSlide: false,
    },
  },
});

const tab_slider_func = () => {
  if (window.innerWidth > 992) {
    tab_slider.disable();
    return;
  }

  tab_slider.enable();
};

tab_slider.on("slideChange", (e) => {
  const trigger = document.querySelector(".nav-tabs").children[e.activeIndex];

  console.log(trigger);

  const tab = bootstrap.Tab.getInstance(trigger);

  console.log(bootstrap.Tab);
  console.log(tab);
});

window.addEventListener("load", tab_slider_func);
window.addEventListener("resize", tab_slider_func);

const tab_content_height = () => {
  const tab_content = document.querySelector(".tab-content");

  if (typeof tab_content == "undefined" || tab_content == null) return;

  const heights = [];

  Array.from(tab_content.children).forEach((element, index) => {
    heights.push(element.offsetHeight);
  });

  tab_content.style.height = Math.max(...heights) + "px";
};

window.addEventListener("load", tab_content_height);
window.addEventListener("resize", tab_content_height);

/****************************************
lighbox
****************************************/
const lightbox = GLightbox({
  skin: "clean video-lightbox",
});

const main_search =
  '<div class="main-search-content">' +
  "<form>" +
  '<input type="text" placeholder="Search">' +
  '<button type="submit">' +
  '<i class="fas fa-search"></i>' +
  "</button>" +
  "</form>" +
  "</div>";

const search_lightbox = GLightbox({
  elements: [
    {
      content: main_search,
      height: "auto",
    },
  ],
  touchNavigation: false,
  touchFollowAxis: false,
  keyboardNavigation: false,
  draggable: false,
  skin: "clean main-search-lightbox",
});

Array.from(document.querySelectorAll(".main-search")).forEach(
  (element, index) => {
    element.addEventListener("click", () => {
      search_lightbox.open();
    });
  }
);

/****************************************
custom scrollbar
****************************************/
var scrollbar = OverlayScrollbars(document.querySelector("body"), {
  overflowBehavior: {
    x: "hidden",
    y: "scroll",
  },
  callbacks: {
    onInitialized: () => {
      testimonial_box_swiper.init();
      icon_box_swiper.init();
      //hero_swiper.init();
      //hero_swiper_2.init();
    },
    onScroll: () => {
      const scroll_position = scrollbar.scroll().position.y;
      const navigation = document.querySelector(".navigation");

      if (typeof navigation === "undefined" || navigation === null) return;

      if (window.innerHeight > 991 && scroll_position > 53) {
        navigation.classList.add("scrolled");
      } else if (window.innerHeight < 991 && scroll_position > 30) {
        navigation.classList.add("scrolled");
      } else {
        navigation.classList.remove("scrolled");
      }
    },
  },
});

/****************************************
navigation
****************************************/

const navigation_responsive = () => {
  const width = window.innerWidth;
  const navigation = document.querySelector(".navigation");

  if (typeof navigation === "undefined" || navigation === null) return;

  if (width < 992) {
    navigation.classList.add("responsive");
  } else {
    navigation.classList.remove("responsive");
  }
};

window.addEventListener("resize", navigation_responsive);
window.addEventListener("load", navigation_responsive);

// display navigation on mobile
const navigation = document.querySelector(".navigation-bar");

if (typeof navigation !== "undefined" && navigation !== null) {
  document.querySelector(".navigation-bar").addEventListener("click", (e) => {
    document.querySelector(".navigation").classList.add("shown");
  });
}

var getHeight = function (el) {
    var el_style = window.getComputedStyle(el),
      el_display = el_style.display,
      el_position = el_style.position,
      el_visibility = el_style.visibility,
      el_max_height = el_style.maxHeight.replace("px", "").replace("%", ""),
      wanted_height = 0;

    // if its not hidden we just return normal height
    if (el_display !== "none" && el_max_height !== "0") {
      return el.offsetHeight;
    }

    // the element is hidden so:
    // making the el block so we can meassure its height but still be hidden
    el.style.position = "absolute";
    el.style.visibility = "hidden";
    el.style.display = "block";

    wanted_height = el.offsetHeight;

    // reverting to the original values
    el.style.display = el_display;
    el.style.position = el_position;
    el.style.visibility = el_visibility;

    return wanted_height;
  },
  toggleSlide = function (el, display = "block") {
    var el_max_height = 0;

    if (el.getAttribute("data-max-height")) {
      // we've already used this before, so everything is setup
      if (el.style.maxHeight.replace("px", "").replace("%", "") === "0") {
        el.style.maxHeight = el.getAttribute("data-max-height");
      } else {
        el.style.maxHeight = "0";
      }
    } else {
      el_max_height = getHeight(el) + "px";
      el.style["transition"] = "max-height 0.5s ease-in-out";
      el.style.overflowY = "hidden";
      el.style.maxHeight = "0";
      el.setAttribute("data-max-height", el_max_height);
      el.style.display = display;

      // we use setTimeout to modify maxHeight later than display (to we have the transition effect)
      setTimeout(function () {
        el.style.maxHeight = el_max_height;
      }, 10);
    }
  };

Array.from(document.querySelectorAll(".has-child")).forEach(
  (element, index) => {
    element.addEventListener("click", (e) => {
      if (window.innerWidth > 992) return;

      if (
        e.target.parentElement.parentElement.classList.contains("has-child") ||
        e.target.parentElement.parentElement.classList.contains("parent")
      ) {
        e.preventDefault();
      }

      console.log(e.target.parentElement.parentElement);

      if (e.currentTarget.classList.contains("dropped")) {
        toggleSlide(e.currentTarget.querySelector(".child"));
        e.currentTarget.classList.remove("dropped");
        return;
      }

      // hide dropdown for other list items
      Array.from(
        e.currentTarget.parentElement.querySelectorAll(".has-child.dropped")
      ).forEach((e, i) => {
        e.classList.remove("dropped");
        toggleSlide(e.querySelector(".child"));
      });

      e.currentTarget.classList.add("dropped");

      toggleSlide(e.currentTarget.querySelector(".child"));
    });
  }
);

// hide navigation on mobile
const close_button = document.querySelector(".close-button");

if (typeof close_button != "undefined" && close_button != null) {
  close_button.addEventListener("click", (e) => {
    const dropped = document.querySelector(".dropped");

    if (typeof dropped == "undefined" && dropped == null) {
      toggleSlide(dropped.querySelector(".child"));
      dropped.classList.remove("dropped");
    }

    document.querySelector(".navigation").classList.remove("shown");
  });
}

/****************************************
career accordion
****************************************/

{
  const career_accordion = document.querySelector(".career-accordion");

  // separate the teaser text
  document
    .querySelectorAll(".career-accordion-item")
    .forEach((parent, parent_index) => {
      const element = parent.querySelector(".teaser");

      const teased_content = element.innerHTML.replace(
        /^(.{166}[^\s]*).*/,
        "$1"
      );

      element.dataset.remaining = element.innerHTML.substr(
        teased_content.length,
        element.innerHTML.length
      );

      element.innerHTML = teased_content + "...";
    });

  // add shown class to the parent
  document
    .querySelectorAll(".accordion-collapse.show")
    .forEach((element, index) => {
      const parent = element.parentElement;
      parent.classList.add("shown");

      parent
        .querySelector('div[data-bs-toggle="collapse"] a')
        .classList.add("button-bg");
      parent
        .querySelector('div[data-bs-toggle="collapse"] i')
        .classList.remove("fa-arrow-down");
      parent
        .querySelector('div[data-bs-toggle="collapse"] i')
        .classList.add("fa-times");

      const teaser_element = parent.querySelector(".teaser");
      teaser_element.innerHTML = teaser_element.innerHTML.replace(
        "...",
        teaser_element.dataset.remaining
      );
    });

  // execute when tab-pane closes
  if (typeof career_accordion != "undefined" && career_accordion != null) {
    career_accordion.addEventListener("hide.bs.collapse", (e) => {
      const target = e.target;
      const header = target.previousElementSibling;
      const teaser_element = header.querySelector(".teaser");

      target.parentElement.classList.remove("shown");

      header
        .querySelector('div[data-bs-toggle="collapse"] a')
        .classList.remove("button-bg");
      header
        .querySelector('div[data-bs-toggle="collapse"] i')
        .classList.add("fa-arrow-down");
      header
        .querySelector('div[data-bs-toggle="collapse"] i')
        .classList.remove("fa-times");

      teaser_element.innerHTML = teaser_element.innerHTML.replace(
        teaser_element.dataset.remaining,
        "..."
      );
    });

    // execute when tab-pane opens
    career_accordion.addEventListener("show.bs.collapse", (e) => {
      const target = e.target;
      const header = target.previousElementSibling;
      const teaser_element = header.querySelector(".teaser");

      e.target.parentElement.classList.add("shown");

      header
        .querySelector('div[data-bs-toggle="collapse"] a')
        .classList.add("button-bg");
      header
        .querySelector('div[data-bs-toggle="collapse"] i')
        .classList.remove("fa-arrow-down");
      header
        .querySelector('div[data-bs-toggle="collapse"] i')
        .classList.add("fa-times");

      teaser_element.innerHTML = teaser_element.innerHTML.replace(
        "...",
        teaser_element.dataset.remaining
      );
    });
  }
}

/****************************************
comment thread
****************************************/

const comment_thread = () => {
  const reply = document.querySelectorAll(".blog-detail-comment-single-reply");

  if (typeof reply === "undefined" || reply === null) return;

  Array.from(reply).forEach((element, index) => {
    const parent = element.parentElement;
    let height = element.parentElement.querySelector("p").offsetHeight;

    let top =
      element.querySelector(".comment-author").getBoundingClientRect().bottom -
      parent.querySelector(".comment-author").getBoundingClientRect().bottom;

    let left =
      element.querySelector(".comment-author").getBoundingClientRect().left -
      parent.querySelector(".comment-author").getBoundingClientRect().left;

    height += 94;
    left -= 10;

    element.querySelector(".thread").style.height = height + "px";
    if (window.innerWidth > 992) {
      element.querySelector(".thread").style.top = -(top / 2) + "px";
      element.querySelector(".thread").style.left = left + "px";
    } else {
      element.querySelector(".thread").style.top =
        -(top - parent.querySelector(".comment-author").offsetHeight * 0.8) +
        "px";
      if (window.innerWidth > 768) {
        element.querySelector(".thread").style.left = left - 50 + "px";
      } else {
        element.querySelector(".thread").style.left = left - 45 + "px";
      }
    }
  });
};

window.addEventListener("load", comment_thread);
window.addEventListener("resize", comment_thread);

/****************************************
file input
****************************************/
{
  const file_inputs = document.querySelectorAll('input[type="file"]');

  document.addEventListener("click", (e) => {
    if (!e.target.closest(".file-upload")) return;

    const parent = e.target.closest(".file-upload");
    const input = parent.querySelector("input");

    // open the file explorer
    input.click();
  });

  Array.from(file_inputs).forEach((element, index) => {
    element.addEventListener("change", (e) => {
      const file = element.files[0];
      const file_name_element = element.parentElement.querySelector(".file");

      file_name_element.innerHTML =
        file.name.slice(0, 9) +
        "..." +
        file.name.slice(file.name.length - 4, file.name.length);
    });
  });
}

/****************************************
hero slider section (DİNAMİK SÜRÜM)
****************************************/
const hero_swiper = new Swiper(".hero-slider-container", {
  init: true,
  slidesPerView: 1,
  speed: 800,
  pagination: {
    el: ".hero-pagination .swiper-wrapper",
    clickable: true,
    bulletClass: "hero-pagination-bullet swiper-slide",
    bulletActiveClass: "hero-pagination-bullet-active",
    renderBullet: (index, className) => {
      if (typeof hero_pagination === "undefined" || !hero_pagination[index])
        return "";

      let item = hero_pagination[index];
      return `
        <div class="${className} swiper-slide">
          <div class="icon-box txt-center">
            <div class="icon-circle icon-circle-lg mg-center">
              <img src="${item.icon}" alt="icon">
            </div>
            <h4 class="f-w-500">${item.name}</h4>
            <p class="c-grey">${item.paragraph}</p>
          </div>
        </div>
      `;
    },
  },
});

const hero_swiper_pagination = new Swiper(".hero-pagination", {
  init: true,
  slidesPerView: 4,
  spaceBetween: 14,
  slideToClickedSlide: true,
  breakpoints: {
    0: {
      slidesPerView: 1.2,
      centeredSlides: true,
    },
    600: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 4,
    },
  },
});

hero_swiper.on("slideChange", () => {
  hero_swiper_pagination.slideTo(hero_swiper.activeIndex);
});

hero_swiper_pagination.on("click", (swiper) => {
  const clickedIndex = swiper.clickedIndex;
  hero_swiper.slideTo(clickedIndex);
});

hero_swiper.on("afterInit", () => {
  hero_swiper_pagination.update();
});

hero_swiper.on("slideChange", (e) => {
  hero_swiper_pagination.slideTo(e.activeIndex);
});

hero_swiper_pagination.on("slideChange", (e) => {
  hero_swiper.slideTo(e.activeIndex);
});

/****************************************
section after hero slider
****************************************/

const get_bottom_cords = (el, child) => {
  let cords = [];

  Array.from(el.querySelectorAll(child)).forEach((element, index) => {
    cords.push(element.getBoundingClientRect().bottom);
  });

  return Math.max(...cords);
};
