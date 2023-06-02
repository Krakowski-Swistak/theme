class WaveGenerator {
    constructor(waveType, parentTags) {
        this.waveType = waveType;
        this.parentTags = parentTags;
        this.arrayFromParentTags = Array.from(parentTags);
    }

    runGenerator() {
        return this.arrayFromParentTags.forEach(tag => {
            tag.appendChild(this.waveType.render());
        })
    }

    generatorinit() {
        return this.runGenerator();
    }
}

export default WaveGenerator;