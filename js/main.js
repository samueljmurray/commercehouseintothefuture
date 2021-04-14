// Create a new masonry container.
let qsRegex;
const isotopeOptions = {
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
        columnWidth: 370
    }
};
let grid = document.querySelector('.flex-grid');
// const container = new Isotope(grid, isotopeOptions);

// Play each audio story.
function playStory(element, e) {
    const planetElements = document.getElementsByClassName('story');
    const audioElements = document.getElementsByTagName('audio');
    const audio = document.getElementById(element);

    const paused = audio.paused;

    // Pause all currently playing audio.
    for(i=0; i<audioElements.length; i++) {
        if (audio.currentSrc != audioElements[i].currentSrc) {
            audioElements[i].pause();
            audioElements[i].controls = false;
        }
    }

    // Remove the active state from all planets.
    for(i=0; i<planetElements.length; i++) {
        if (element != planetElements[i]) {
            planetElements[i].classList.remove("active");
        }
    }

    if (paused) {
        audio.currentTime = 0;
        audio.play()
        audio.controls = true;

        e.currentTarget.classList.add("active");
    }
    else {
        audio.pause()
        audio.controls = false;

        e.currentTarget.classList.remove("active");
    }

    container.reloadItems()
}

// Play each audio story.
function showStory(element, e) {
    const feature = document.getElementById('feature');
    feature.classList.remove("hidden");

    // Hide all feature stories.
    const stories = document.getElementsByClassName('story-item');
    for(i=0; i<stories.length; i++) {
        stories[i].classList.add("hidden");
    }

    // Show the right story.
    const story = document.getElementById(element);
    story.classList.remove("hidden");

    // Scroll the feature box into view.
    feature.scrollIntoView({
        behavior: 'smooth',
        block: 'nearest',
        inline: 'nearest'
    });


}

let elements = document.getElementsByClassName("story");
for (let i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', (e) => {
        let el = e.currentTarget.getAttribute('data-action')
        showStory(el, e)
    }, false);
}
