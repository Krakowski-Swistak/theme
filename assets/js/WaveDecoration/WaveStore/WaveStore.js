import Wave from '../Wave/Wave';
import WaveGenerator from '../Generator/WaveGenerator';

class WavesStore {

    static smallWave = new Wave(45, 'small', 7);
    static bigWave = new Wave(45, 'big', 9);
    static tags = [
        { id: 0, elements: document.getElementsByTagName('h1'), waveType: WavesStore.smallWave },
        { id: 1, elements: document.getElementsByTagName('h2'), waveType: WavesStore.smallWave },
        { id: 2, elements: document.getElementsByClassName('ks-decoration'), waveType: WavesStore.bigWave },
    ];

    static initWaveStore() {
        return WavesStore.tags.map(types => {
            const wave = new WaveGenerator(types.waveType, types.elements);
            return wave.generatorinit();
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    WavesStore.initWaveStore();
})