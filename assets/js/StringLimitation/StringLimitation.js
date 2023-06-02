class StringLimitation {
        
    static slides = document.querySelectorAll('[data-case-studies-content]');
    static slidesContainer = document.querySelectorAll('[data-case-slide]');

    static createMoreButton(callback) {
        const readmore = 'Czytaj więcej';
        const readless = 'Zwiń';
        const button = document.createElement('button');
        button.textContent = readmore;
        button.classList.add('ks-button');
        button.classList.add('ks-button--primary');
        button.classList.add('ks-button--slide');

        button.addEventListener('click', () => {
            callback();
            if(button.textContent === readmore) {
                button.textContent = readless;
            }
            else {
                button.textContent = readmore
            }  
        })

        return button;
    }

    static transformContent(container, charactersLimit) {

        let entryContent;
        let transformedContent;
        let isContainerExpanded = false;

        const triggerToggle = () => {
            return toggleContent(entryContent, `${transformedContent} . . .`);
        }

        const toggleContent = (content, newContent) => {
            isContainerExpanded = !isContainerExpanded;
            container.innerText = isContainerExpanded ? content : newContent;
        }
        
        let containerContent = container.innerText;
        const containerCharactersNumber = container.innerText.length;
        const maxAcceptableCharactersNumber = charactersLimit;

        if(containerCharactersNumber > maxAcceptableCharactersNumber) {
            entryContent = containerContent;
            transformedContent = entryContent.substring(0, maxAcceptableCharactersNumber).trim();
            container.innerText = isContainerExpanded ? entryContent : `${transformedContent} . . .`;
            container.parentElement.appendChild(StringLimitation.createMoreButton(triggerToggle));
        }
        return container.innerText;
    }

    static initLimitingOnCaseStudiesSlider() {
        return StringLimitation.slides.forEach(slide => {
            StringLimitation.transformContent(slide, 500);
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    StringLimitation.initLimitingOnCaseStudiesSlider();
})