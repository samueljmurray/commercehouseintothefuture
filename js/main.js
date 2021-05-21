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

// Play each audio story.
function playStory(element, e) {
    console.log('Playing story');
    const audioStories = document.getElementsByClassName('audio');
    const story = document.getElementById(element);
    const audio = story.querySelector('.audio');

    if (audio !== null) {
        // Pause all currently playing audio.
        for (i = 0; i < audioStories.length; i++) {
            if (audio.currentSrc != audioStories[i].currentSrc) {
                audioStories[i].pause();
                audioStories[i].controls = false;
            }
        }

        const paused = audio.paused;

        if (paused) {
            audio.currentTime = 0;
            audio.controls = true;
        } else {
            audio.pause()
            audio.controls = false;
        }
    }
    else {
        // Pause all audio.
        for (i = 0; i < audioStories.length; i++) {
            audioStories[i].pause();
            audioStories[i].controls = false;
        }
    }
}

// Show each story.
function showStory(element, e) {
    console.log('Showing story');
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

// Hide each story.
async function hideStory(element, e) {
    console.log('Hiding story');
    // Pause all currently playing audio.
    const audioStories = document.getElementsByClassName('audio');
    for (i = 0; i < audioStories.length; i++) {
        audioStories[i].pause();
        audioStories[i].controls = false;
    }

    const stories = document.getElementById('stories');
    stories.scrollIntoView({
        behavior: 'smooth',
        block: "start",
        inline: "nearest"
    });

    // Give at least 500ms until hiding the feature story.
    await sleep(500);

    const feature = document.getElementById('feature');
    feature.classList.add("hidden");
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

let elements = document.getElementsByClassName("story");
for (let i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', (e) => {
        let el = e.currentTarget.getAttribute('data-action')
        showStory(el, e);
        playStory(el, e);
    }, false);
}

let close = document.getElementsByClassName("close");
for (let i = 0; i < close.length; i++) {
    close[i].addEventListener('click', (e) => {
        let el = e.currentTarget.getAttribute('data-action')
        hideStory(el, e);
    }, false);
}