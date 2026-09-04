document.addEventListener('DOMContentLoaded', () => {
    // Scroll spy for active nav link
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.sidebar-nav-link');

    function setActiveSection(sectionId) {
        navLinks.forEach(link => {
            const active = link.getAttribute('href') === '#' + sectionId;
            link.classList.toggle('active', active);
            if (active) {
                link.setAttribute('aria-current', 'true');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    }

    if ('IntersectionObserver' in window) {
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setActiveSection(entry.target.getAttribute('id'));
                }
            });
        }, {
            rootMargin: '-40% 0px -55% 0px',
            threshold: 0,
        });

        sections.forEach(section => sectionObserver.observe(section));
    } else {
        function updateActiveLinkFallback() {
            const scrollPosition = window.scrollY + window.innerHeight / 3;
            let currentSection = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });
            setActiveSection(currentSection);
        }
        window.addEventListener('scroll', updateActiveLinkFallback, { passive: true });
        updateActiveLinkFallback();
    }

    // Reveal on scroll
    const revealElements = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // Mobile menu toggle
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

    function openMenu() {
        mobileMenu.classList.remove('translate-x-full');
        mobileOverlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenu.classList.add('translate-x-full');
        mobileOverlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    if (menuButton) {
        menuButton.addEventListener('click', () => {
            if (mobileMenu.classList.contains('translate-x-full')) {
                openMenu();
            } else {
                closeMenu();
            }
        });
    }

    mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', closeMenu);
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMenu();
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Project gallery lightbox
    const galleries = document.querySelectorAll('.gallery');
    if (galleries.length) {
        let lightbox = null;
        let currentImages = [];
        let currentIndex = 0;

        function closeLightbox() {
            lightbox.classList.remove('open');
            document.body.style.overflow = '';
        }

        function render() {
            const imgEl = lightbox.querySelector('.lightbox-image');
            imgEl.src = currentImages[currentIndex];
            const thumbs = galleries;
            const captionEl = lightbox.querySelector('.lightbox-caption');
            captionEl.textContent = (currentIndex + 1) + ' / ' + currentImages.length;
        }

        function openAt(btn) {
            if (!lightbox) {
                lightbox = document.createElement('div');
                lightbox.className = 'lightbox';

                const figure = document.createElement('div');
                figure.className = 'lightbox-figure';

                const image = document.createElement('img');
                image.className = 'lightbox-image';
                image.alt = 'Project screenshot';

                const caption = document.createElement('span');
                caption.className = 'lightbox-caption';

                figure.appendChild(image);
                figure.appendChild(caption);

                const prev = document.createElement('button');
                prev.className = 'lightbox-nav lightbox-prev';
                prev.type = 'button';
                prev.setAttribute('aria-label', 'Previous image');
                prev.textContent = '‹';
                prev.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
                    render();
                });

                const next = document.createElement('button');
                next.className = 'lightbox-nav lightbox-next';
                next.type = 'button';
                next.setAttribute('aria-label', 'Next image');
                next.textContent = '›';
                next.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % currentImages.length;
                    render();
                });

                const close = document.createElement('button');
                close.className = 'lightbox-close';
                close.type = 'button';
                close.setAttribute('aria-label', 'Close viewer');
                close.textContent = '×';
                close.addEventListener('click', closeLightbox);

                lightbox.appendChild(figure);
                lightbox.appendChild(prev);
                lightbox.appendChild(next);
                lightbox.appendChild(close);

                lightbox.addEventListener('click', (e) => {
                    if (e.target === lightbox) closeLightbox();
                });

                document.body.appendChild(lightbox);
            }

            currentImages = [...btn.closest('.gallery').querySelectorAll('img[data-full]')].map(img => img.getAttribute('data-full'));

            const explicitIndex = btn.hasAttribute('data-index') ? parseInt(btn.getAttribute('data-index'), 10) : 0;
            currentIndex = currentImages.length ? Math.min(explicitIndex, currentImages.length - 1) : 0;

            render();
            lightbox.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        document.querySelectorAll('[data-gallery-open]').forEach(btn => {
            btn.addEventListener('click', () => openAt(btn));
        });

        document.addEventListener('keydown', (e) => {
            if (!lightbox || !lightbox.classList.contains('open')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
                render();
            }
            if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % currentImages.length;
                render();
            }
        });
    }
});
