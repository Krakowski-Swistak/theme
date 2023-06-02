class Line {
    constructor(degree, type) {
        this.degree = degree;
        this.type = type;
    }

    render() {
        const line = document.createElement('div');
        line.classList.add('ks-decoration__line');
        line.classList.add(`ks-decoration__line--${this.type}`);
        line.style.transform = `rotate(${this.degree}deg)`;
        return line;
    }
}

export default Line;