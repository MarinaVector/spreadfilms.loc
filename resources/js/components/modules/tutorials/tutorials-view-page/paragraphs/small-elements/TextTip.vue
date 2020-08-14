<template>
    <div class="screenshot-wrapper">
        <div id="hotspot-live-0-0" screenshot="0" class="hotspot-live left">
            <div class="hotspot-text">
                <p>Here is Text</p>
            </div>
            <div class="options">
                <div class="name">
                    Tip 0
                </div>
                <div class="edit-line left"><span class="edit-line-inner"><i class="fal fa-paint-brush"></i></span>
                </div>
                <div class="edit-line right"><span class="edit-line-inner"><i class="fal fa-paint-brush"></i></span>
                </div>
                <div class="edit-line top"><span class="edit-line-inner"><i class="fal fa-paint-brush"></i></span>
                </div>
                <div class="edit-line bottom"><span class="edit-line-inner"><i
                    class="fal fa-paint-brush"></i></span></div>
                <div class="remove-hotspot"><i class="fal fa-trash"></i></div>
                <div class="edit-hotspot"><i class="fal fa-pen"></i></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TextTip"
    }
</script>

<style scoped>

    .screenshot-wrapper .hotspot-live {
        position: absolute;
        font-size: 0.8em;
        z-index: 12345;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.5);
    }

    .screenshot-wrapper .hotspot-live .hotspot-text {
        padding: 20px;
        border-radius: 3px;
        background: #fff;
        position: relative;
        display: inline-block;
    }

    .screenshot-wrapper .hotspot-live .hotspot-text p {
        margin: 0;
    }

    .screenshot-wrapper .hotspot-live .hotspot-text:before {
        content: "";
        width: 0;
        height: 0;
        position: absolute;
    }

    .screenshot-wrapper .hotspot-live.left .hotspot-text:before {
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 10px solid #fff;
        transform: translateX(100%) translateY(-50%);
        left: auto;
        top: 50%;
        right: 0;
    }

    .screenshot-wrapper .hotspot-live.right .hotspot-text:before {
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-right: 10px solid #fff;
        left: 0;
        top: 50%;
        transform: translateX(-100%) translateY(-50%);
    }

    .screenshot-wrapper .hotspot-live.top .hotspot-text:before {
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid #fff;
        transform: translateY(-100%) translateX(-50%);
        top: 0;
        left: 50%;
    }

    .screenshot-wrapper .hotspot-live.bottom .hotspot-text:before {
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #fff;
        transform: translateY(100%) translateX(-50%);
        bottom: 0;
        left: 50%;
    }

    .screenshot-wrapper .hotspot-canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 999;
        pointer-events: none;
    }

    .screenshot-wrapper .hotspot-live .edit-line {
        position: absolute;
        width: 15px;
        height: 15px;
        cursor: pointer;
        color: #fff;
        z-index: 99;
    }

    .screenshot-wrapper .hotspot-live .edit-line .edit-line-inner {
        background: #888;
        text-align: center;
        border-radius: 100%;
        width: 100%;
        height: 100%;
        display: block;
        transform-origin: center;
        transform: scale(1);
        transition: all .15s ease-in-out;
        font-size: 0;
    }

    .screenshot-wrapper .hotspot-live .edit-line:hover .edit-line-inner {
        font-size: 1em;
        transform: scale(2);
        background: #000;
    }

    .screenshot-wrapper .hotspot-live .edit-line i {
        font-size: .5em;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
    }

    .screenshot-wrapper .hotspot-live .edit-line.left {
        right: 0;
        top: 50%;
        transform: translateY(-50%) translateX(50%);
    }

    .screenshot-wrapper .hotspot-live .edit-line.right {
        left: 0;
        top: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    .screenshot-wrapper .hotspot-live .edit-line.bottom {
        bottom: 0;
        left: 50%;
        transform: translateY(50%) translateX(-50%);
    }

    .screenshot-wrapper .hotspot-live .edit-line.top {
        top: 0;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    .screenshot-wrapper .hotspot-live:hover .edit-line {
        opacity: 1;
    }

    .screenshot-wrapper .hotspot-live .name {
        position: absolute;
        border-radius: 3px;
        background: rgba(255, 255, 255, 0.5);
        text-align: center;
        padding: 5px;
        top: -10px;
        transform: translateY(-100%);
        left: 0;
        text-align: center;
        width: 100%;
        pointer-events: none;
        font-size: 0.65em;
    }

    .screenshot-wrapper .hotspot-live .edit-hotspot,
    .screenshot-wrapper .hotspot-live .remove-hotspot {
        position: absolute;
        border-radius: 3px;
        color: #fff;
        background: #333;
        text-align: center;
        padding: 3px;
        top: 3px;
        font-size: 0.65em;
        cursor: pointer;
        transform: scale(1);
        transition: transform .15s ease-in-out;
    }

    .screenshot-wrapper .hotspot-live .edit-hotspot:hover,
    .screenshot-wrapper .hotspot-live .remove-hotspot:hover {
        transform: scale(1.8);
    }

    .screenshot-wrapper .hotspot-live .remove-hotspot {
        right: 5px;
        background: #00bff9
    }

    .screenshot-wrapper .hotspot-live .edit-hotspot {
        left: 5px;
    }

    .screenshot-wrapper .hotspot-live .options {
        opacity: 0;
        transition: opacity .15s ease-in-out;
        pointer-events: none;
    }

    .screenshot-wrapper .hotspot-live:hover .options {
        pointer-events: all;
        opacity: 1;
    }

</style>
