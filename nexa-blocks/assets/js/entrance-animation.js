const nexaScrollAnimation = (target, animation, options = {}) => {
    const defaultOptions = {
        duration: 1000,
        delay: 0,
        repeat: true,
        offset: 0,
        loop: false
    };

    const settings = { ...defaultOptions, ...options };

    // Process offset values
    const getOffsetValues = () => {
        if (typeof settings.offset === 'number') {
            return {
                top: settings.offset,
                bottom: settings.offset,
                left: settings.offset,
                right: settings.offset
            };
        }
        return {
            top: settings.offset.top || 0,
            bottom: settings.offset.bottom || 0,
            left: settings.offset.left || 0,
            right: settings.offset.right || 0
        };
    };

    const offsets = getOffsetValues();

    // Calculate root margin based on offsets
    const getRootMargin = () => {
        const top = `${offsets.top}px`;
        const bottom = `${offsets.bottom}px`;
        const left = `${offsets.left}px`;
        const right = `${offsets.right}px`;
        return `${top} ${right} ${bottom} ${left}`;
    };

    // Create stylesheet for initial states and animation duration
    const style = document.createElement('style');
    const className = 'scroll-animate-hidden';

    style.textContent = `
        .${className} {
            opacity: 0;
            visibility: hidden;
            will-change: transform, opacity;
            transform: translateY(20px);
            animation-duration: ${settings.duration}s;
            animation-delay: ${settings.delay}s;
        }
    `;
    document.head.appendChild(style);

    let isAnimating = new WeakMap();

    // Create Intersection Observer
    const observer = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                const element = entry.target;

                if (entry.isIntersecting && !isAnimating.get(element)) {
                    isAnimating.set(element, true);

                    requestAnimationFrame(() => {
                        element.classList.remove(className);
                        element.classList.add('animate__animated', `animate__${animation}`);
                        if (settings.loop) {
                            element.classList.add('animate__infinite');
                        }
                        element.style.opacity = '1';
                        element.style.visibility = 'visible';
                        element.style.transform = 'translateY(0)';
                        element.style.animationDuration = `${settings.duration}s`;
                        element.style.animationDelay = `${settings.delay}s`;
                    });

                    // Clean up after animation
                    element.addEventListener(
                        'animationend',
                        () => {
                            isAnimating.set(element, false);
                            if (!settings.repeat) {
                                observer.unobserve(element);
                            }
                        },
                        { once: true }
                    );
                } else if (!entry.isIntersecting && settings.repeat) {
                    // Reset element when it leaves viewport
                    isAnimating.set(element, false);
                    element.classList.add(className);
                    element.classList.remove('animate__animated', `animate__${animation}`);
                    if (settings.loop) {
                        element.classList.remove('animate__infinite');
                    }
                    element.style.opacity = '0';
                    element.style.visibility = 'hidden';
                    element.style.transform = 'translateY(20px)';
                    element.style.animationDuration = `${settings.duration}s`;
                    element.style.animationDelay = `${settings.delay}s`;
                }
            });
        },
        {
            root: null,
            rootMargin: getRootMargin()
        }
    );

    // Helper function to convert various input types to an array of elements
    const getElements = target => {
        if (typeof target === 'string') {
            return Array.from(document.querySelectorAll(target));
        } else if (target instanceof NodeList) {
            return Array.from(target);
        } else if (target instanceof Element) {
            return [target];
        }
        return [];
    };

    // Initialize and observe elements
    const elements = getElements(target);
    elements.forEach(element => {
        // Add initial hidden class
        element.classList.add(className);
        isAnimating.set(element, false);
        observer.observe(element);
    });

    // Return a cleanup function
    return () => {
        elements.forEach(element => {
            observer.unobserve(element);
            element.classList.remove(className, 'animate__animated', `animate__${animation}`);
            if (settings.loop) {
                element.classList.remove('animate__infinite');
            }
            element.style.transform = '';
            element.style.opacity = '';
            element.style.visibility = '';
            isAnimating.delete(element);
        });
        style.remove();
    };
};

document.addEventListener('DOMContentLoaded', () => {
    const nxEntranceAnimation = document.querySelectorAll('.nxe-animation');

    if (nxEntranceAnimation && nxEntranceAnimation.length > 0) {
        nxEntranceAnimation.forEach(nxElement => {
            const data = nxElement.dataset?.nxeAnimation;
            const options = JSON.parse(data);
            const nxAnimation = options?.animation;

            if (options) {
                nexaScrollAnimation(nxElement, nxAnimation, {
                    duration: options?.duration,
                    delay: options?.delay,
                    repeat: options?.repeat,
                    loop: options?.loop
                });
            }
        });
    }
});
