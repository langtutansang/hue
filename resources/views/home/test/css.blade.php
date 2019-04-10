<link href="{{ asset('home/assets/vendor_plugins/carousel/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('home/assets/vendor_plugins/carousel/owl.theme.default.min.css') }}" rel="stylesheet" />
<style>
    .owl-navigate {
        display: flex;
        /* flex-shrink: initial; */
        position: absolute;
        top: calc( 50% - 40px);
        width: 100%;
        left: 0px;
    }
    .owl-navigate button {
        background: unset;
        border: unset;
        font-size: 40px;
    }

    .owl-navigate button:last-child {
        margin-left:auto;
    }

    .bg-course {
        border-bottom:solid 2px  #3b5998 !important;
    }
    #timetest{
        position: fixed;
        top: 110px;
        right: 20px;
        background-color: white; 
        display: none
    }
    #clockdiv{
        font-family: sans-serif;
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        font-size: 20px;
    }

    #clockdiv > div{
        padding: 10px;
        border-radius: 3px;
        background: #00BF96;
        display: inline-block;
    }

    #clockdiv div > span{
        padding: 15px;
        border-radius: 3px;
        background: #00816A;
        display: inline-block;
    }

    .smalltext{
        padding-top: 5px;
        font-size: 16px;
    }
</style>