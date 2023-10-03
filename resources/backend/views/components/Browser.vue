<template>
    <div class="container">
        <div class="row">
            <div class="column left">
                <span class="dot" style="background:#ED594A;"></span>
                <span class="dot" style="background:#FDD800;"></span>
                <span class="dot" style="background:#5AC05A;"></span>
            </div>
            <div class="column middle">
                <input type="text" readonly disabled :value="'https://'+shop">
            </div>
            <div class="column right">
                <div style="float:right">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </div>

        <div class="content">
            <div id="web-preview-container" class="web-preview-container"  :style="{backgroundColor:backgroundColor}">
                <slot></slot>
            </div>
        </div>
    </div>    
</template>
<script>
export default {
    name: 'WebPreview',
    props: {
        backgroundColor: {
            type: String,
            default: '#ffffff'
        }
    },
    data() {
        return {
            shop: window.SHOP
        }
    }
}
</script>
<style scoped  lang="scss">
.container {
        border: 3px solid #f1f1f1;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    /* Container for columns and the top "toolbar" */
    .row {
        display:flex;
        padding: 10px;
        background: #f1f1f1;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        margin: 0;
    }

    /* Create three unequal columns that floats next to each other */
    .column {
        float: left;
    }

    .left {
        width: 15%;
    }

    .right {
        width: 10%;
    }

    .middle {
        width: 75%;
    }

    /* Clear floats after the columns */
    .row:after {
    content: "";
        display: table;
        clear: both;
    }

    /* Three dots */
    .dot {
        margin-top: 4px;
        height: 12px;
        width: 12px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    /* Style the input field */
    input[type=text] {
        width: 100%;
        border-radius: 3px;
        border: none;
        background-color: white;
        margin-top: -8px;
        height: 25px;
        color: #666;
        padding: 5px;
    }
    .content {
        background-color: #fff;
    }
    /* Three bars (hamburger menu) */
    .bar {
        width: 17px;
        height: 3px;
        background-color: #aaa;
        margin: 3px 0;
        display: block;
    }
    #web-preview-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        min-height: 444px;
    }
</style>