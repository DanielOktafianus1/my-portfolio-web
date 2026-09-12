document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.heroNameContainer');
    if (!container) return;

    const spans = [...container.querySelectorAll('span')];

    /* ================= CONFIG ================= */
  let SIZE;

if (window.innerWidth <= 700) {
    SIZE = 90;
} else {
    SIZE = 95;
}

    const GAP = 0;
    const GRAVITY = 0.05;
    const SMOOTH = 0.05;

    let active = null;
    let offsetX = 0;
    let offsetY = 0;
    let targetX = 0;
    let targetY = 0;
    let dragDirX = 0;
    let dragDirY = 0;

    /* ================= INIT LAYOUT ================= */
    function initLayout() {
        const W = container.clientWidth;
        const H = container.clientHeight;

        const leftX  = W * 0.25;
        const rightX = W * 0.75;

        const topY    = H * 0.22;
        const bottomY = H * 0.62;

        placeRow(0, 3, leftX, topY);       // DAN
        placeRow(3, 6, rightX, topY);      // IEL
        placeRow(6, 11, leftX, bottomY);   // OKTAF
        placeRow(11, 16, rightX, bottomY); // IANUS
    }

    function placeRow(start, end, centerX, y) {
        const count = end - start;
        const total = count * SIZE + (count - 1) * GAP;
        let x = centerX - total / 2;

        for (let i = start; i < end; i++) {
            spans[i].x = x;
            spans[i].y = y;
            spans[i].vy = 0;
            apply(spans[i]);
            x += SIZE + GAP;
        }
    }

    initLayout();
    window.addEventListener('resize', initLayout);

    /* ================= MOUSE DRAG ================= */
    spans.forEach(el => {
        el.addEventListener('mousedown', e => {
            active = el;
            offsetX = e.clientX - el.x;
            offsetY = e.clientY - el.y;
            targetX = el.x;
            targetY = el.y;
            el.vy = 0;
            el.style.zIndex = 10;
            dragDirX = 0;
            dragDirY = 0;
        });
    });

    document.addEventListener('mousemove', e => {
        if (!active) return;

        const prevX = targetX;
        const prevY = targetY;

        targetX = clamp(e.clientX - offsetX, 0, container.clientWidth - SIZE);
        targetY = clamp(e.clientY - offsetY, 0, container.clientHeight - SIZE);

        dragDirX = Math.sign(targetX - prevX);
        dragDirY = Math.sign(targetY - prevY);
    });

    document.addEventListener('mouseup', () => release());

    /* ================= TOUCH DRAG (HP) ================= */
    spans.forEach(el => {
        el.addEventListener('touchstart', e => {
            e.preventDefault();
            const t = e.touches[0];

            active = el;
            offsetX = t.clientX - el.x;
            offsetY = t.clientY - el.y;
            targetX = el.x;
            targetY = el.y;
            el.vy = 0;
            el.style.zIndex = 10;
            dragDirX = 0;
            dragDirY = 0;
        }, { passive: false });
    });

    document.addEventListener('touchmove', e => {
        if (!active) return;
        e.preventDefault();

        const t = e.touches[0];
        const prevX = targetX;
        const prevY = targetY;

        targetX = clamp(t.clientX - offsetX, 0, container.clientWidth - SIZE);
        targetY = clamp(t.clientY - offsetY, 0, container.clientHeight - SIZE);

        dragDirX = Math.sign(targetX - prevX);
        dragDirY = Math.sign(targetY - prevY);
    }, { passive: false });

    document.addEventListener('touchend', release);
    document.addEventListener('touchcancel', release);

    function release() {
        if (!active) return;
        active.style.zIndex = '';
        active = null;
        dragDirX = 0;
        dragDirY = 0;
    }

    /* ================= MAIN LOOP ================= */
    function loop() {
        spans.forEach(el => {
            if (el === active) {
                el.x += (targetX - el.x) * SMOOTH;
                el.y += (targetY - el.y) * SMOOTH;

                if (dragDirY < 0) liftStack(el);
                else resolveChainX(el);
            } else {
                const floor = getFloor(el);
                if (el.y < floor) {
                    el.vy += GRAVITY;
                    el.y += el.vy;
                } else {
                    el.y = floor;
                    el.vy = 0;
                }
            }

            el.x = clamp(el.x, 0, container.clientWidth - SIZE);
            el.y = clamp(el.y, 0, container.clientHeight - SIZE);
        });

        resolveRows();
        spans.forEach(apply);
        requestAnimationFrame(loop);
    }

    requestAnimationFrame(loop);

    /* ================= FLOOR ================= */
    function getFloor(el) {
        let floor = container.clientHeight - SIZE;
        spans.forEach(o => {
            if (o === el) return;
            const overlapX = el.x < o.x + SIZE && el.x + SIZE > o.x;
            if (overlapX && el.y < o.y) {
                floor = Math.min(floor, o.y - SIZE);
            }
        });
        return floor;
    }

    /* ================= STACK LIFT ================= */
    function liftStack(el) {
        spans.forEach(o => {
            if (o === el) return;
            const overlapX = el.x < o.x + SIZE && el.x + SIZE > o.x;
            const touching = el.y <= o.y + SIZE + 1 && el.y > o.y;
            if (overlapX && touching) {
                o.y = el.y - SIZE;
                o.vy = 0;
                liftStack(o);
            }
        });
    }

    /* ================= HORIZONTAL CHAIN ================= */
    function resolveChainX(el, dir = null) {
        spans.forEach(o => {
            if (o === el) return;

            const overlapY = el.y < o.y + SIZE && el.y + SIZE > o.y;
            if (!overlapY) return;

            if (dir !== 'left' && el.x + SIZE > o.x && el.x < o.x) {
                const target = el.x + SIZE + GAP;
                if (o.x < target) {
                    o.x = target;
                    resolveChainX(o, 'right');
                }
            }

            if (dir !== 'right' && el.x < o.x + SIZE && el.x > o.x) {
                const target = el.x - SIZE - GAP;
                if (o.x > target) {
                    o.x = target;
                    resolveChainX(o, 'left');
                }
            }
        });
    }

    /* ================= ROW LOCK ================= */
    function resolveRows() {
        const rows = [];

        spans.forEach(el => {
            const row = rows.find(r => Math.abs(r[0].y - el.y) < SIZE * 0.6);
            row ? row.push(el) : rows.push([el]);
        });

        rows.forEach(row => {
            if (active && !row.includes(active)) return;

            row.sort((a, b) => a.x - b.x);

            for (let i = 1; i < row.length; i++) {
                const minX = row[i - 1].x + SIZE + GAP;
                if (row[i].x < minX) row[i].x = minX;
            }

            const left = row[0].x;
            if (left < 0) row.forEach(el => el.x -= left);

            const right = row[row.length - 1].x + SIZE;
            if (right > container.clientWidth) {
                const overflow = right - container.clientWidth;
                row.forEach(el => el.x -= overflow);
            }
        });
    }

    /* ================= HELPERS ================= */
    function apply(el) {
        el.style.left = el.x + 'px';
        el.style.top = el.y + 'px';
    }

    function clamp(v, min, max) {
        return Math.max(min, Math.min(v, max));
    }
});
