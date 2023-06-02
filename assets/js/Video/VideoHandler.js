class Video {
    static activeClassName = 'active';
    static popupClassName = 'ks-popup';
    static buttons = document.querySelectorAll('[data-video-trigger]');
    static videoId = document.getElementById('ks-video-popup');
    static allOverlays = document.querySelectorAll('.ks-popup .ks-overlay');
    static videoIframe = false;
    static videoSource = false;
    static isVideoRunning = false;

    static renderVideoSrc() {
      return Video.isVideoRunning ? Video.videoIframe.src = Video.videoSource : Video.videoIframe.src = '';
    }
    
    static toggleVideo() {
      Video.buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                Video.videoId.classList.toggle(Video.activeClassName);
                Video.isVideoRunning = !Video.isVideoRunning;
                Video.renderVideoSrc();
            })
        })
    };

    static hideOnOverlayClick() {
      Video.allOverlays.forEach(overlay => {
            overlay.addEventListener('click', () => {
                overlay.closest(`.${Video.popupClassName}`).classList.remove(Video.activeClassName);
                Video.isVideoRunning = false;
                Video.renderVideoSrc();
            })
        })
    };

    static initVideo() {
      Video.videoIframe = document.querySelector('#ks-video-popup iframe');
      if(Video.videoIframe != null) {
        Video.videoSource = `${Video.dataset['data-lazy-src']}&amp;autoplay=1`;
        Video.toggleVideo();
        Video.hideOnOverlayClick();
        Video.renderVideoSrc();
      }
      else {
        return;
      }
    }
}

document.addEventListener('DOMContentLoaded', function() {
  Video.initVideo();
})