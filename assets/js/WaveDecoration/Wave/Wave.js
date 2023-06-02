import Line from '../Line/WaveLine';

class Wave {
    constructor(degree, waveSize, linesCount) {
        this.degree = degree;
        this.waveSize = waveSize;
        this.linesCount = linesCount;
    }

    generateWave(element) {
        for (let i = 0; i < this.linesCount; i++) {
            if(i % 2 === 0) {
                element.appendChild(new Line(-this.degree, this.waveSize).render());
            }
            else {
                element.appendChild(new Line(this.degree, this.waveSize).render());
            }
        }
    }

    render() {
        const wave = document.createElement('div');
        wave.classList.add('ks-decoration__wave');
        wave.classList.add(`ks-decoration__wave--${this.waveSize}`);
        this.generateWave(wave);
        return wave;
    }
}

export default Wave;