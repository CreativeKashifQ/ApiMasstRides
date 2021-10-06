@extends('layouts.app1')
@section('content')
<style>
    .select2-container .select2-selection--single {
     height: 35px !important;
}
</style>
    <!-- Begin Franchise Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <div>
                <h5 class=" mb-0 text-green font-weight-bold">Edit Customer</h5>
            </div>
            <div>
                <a href="{{ route('customer.show') }}" class="btn bg-green text-white btn-sm"><i
                        class="fas fa-eye fa-sm text-white "></i> Show Customers </a>
            </div>
        </div>

        <div class="">
            <div class="modal-body ">

                <form action="{{ route('customer.update',$editcustomer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='row'>
                        <div class="col-md-6 offset-md-3  ">
                            {{-- logo svg start --}}
                            <div class="text-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="2in" height="0.7in"
                                    version="1.1"
                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                    viewBox="0 0 1012.5 478.49" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                                    <defs>
                                        <style type="text/css">
                                            <![CDATA[
                                            .fil11 {
                                                fill: #FEFEFE;
                                                fill-rule: nonzero
                                            }

                                            .fil10 {
                                                fill: #FFF212;
                                                fill-rule: nonzero
                                            }

                                            .fil1 {
                                                fill: #006628;
                                                fill-rule: nonzero
                                            }

                                            .fil2 {
                                                fill: #007733;
                                                fill-rule: nonzero
                                            }

                                            .fil3 {
                                                fill: #00903B;
                                                fill-rule: nonzero
                                            }

                                            .fil9 {
                                                fill: #00AA45;
                                                fill-rule: nonzero
                                            }

                                            .fil4 {
                                                fill: #00C353;
                                                fill-rule: nonzero
                                            }

                                            .fil5 {
                                                fill: #00D354;
                                                fill-rule: nonzero
                                            }

                                            .fil6 {
                                                fill: #00E260;
                                                fill-rule: nonzero
                                            }

                                            .fil8 {
                                                fill: #00F368;
                                                fill-rule: nonzero
                                            }

                                            .fil0 {
                                                fill: #00FF73;
                                                fill-rule: nonzero
                                            }

                                            .fil7 {
                                                fill: #26FF82;
                                                fill-rule: nonzero
                                            }

                                            ]]>
                                        </style>
                                    </defs>
                                    <g id="Layer_x0020_1">
                                        <metadata id="CorelCorpID_0Corel-Layer" />
                                        <g id="_2078077979920">
                                            <path class="fil0"
                                                d="M231.22 198.5c-0.56,0.21 -1.12,0.52 -1.72,0.73 -1.08,0.3 -1.77,0.95 -2.07,1.77l-3.15 -3.15 6.81 0c0.04,0.22 0.09,0.43 0.13,0.65z" />
                                            <path class="fil1"
                                                d="M214.45 403.65c-11.9,18.28 -24.05,36.51 -36.64,54.79 -6.86,9.96 -21.51,9.96 -28.36,0 -12.54,-18.28 -24.75,-36.52 -36.64,-54.79l28.15 -28.15c4.18,6.21 8.41,12.46 12.67,18.67 4.83,7.02 15.22,7.02 20.04,0 4.27,-6.21 8.49,-12.42 12.67,-18.63l28.11 28.11z" />
                                            <path class="fil2"
                                                d="M206.61 344.59l27.89 27.89c-5.13,8.15 -10.35,16.25 -15.61,24.4l-28.11 -28.07c5.35,-8.06 10.61,-16.16 15.82,-24.23z" />
                                            <path class="fil2"
                                                d="M136.51 368.78l-28.11 28.11c-0.04,-0.08 -0.09,-0.13 -0.13,-0.21 -5.21,-8.06 -10.39,-16.17 -15.48,-24.23l27.89 -27.89c5.13,7.98 10.35,16.04 15.69,24.01 0.04,0.09 0.09,0.13 0.13,0.22z" />
                                            <path class="fil3"
                                                d="M254.28 341.06c-5.09,8.19 -10.26,16.42 -15.43,24.61l-27.89 -27.89c5.26,-8.19 10.39,-16.38 15.47,-24.57l27.85 27.85z" />
                                            <path class="fil3"
                                                d="M116.29 337.78l-27.85 27.85c-0.04,-0.09 -0.08,-0.13 -0.13,-0.22 -5.17,-8.11 -10.26,-16.25 -15.31,-24.35l27.85 -27.85c5,8.1 10.13,16.25 15.3,24.36 0.04,0.09 0.09,0.13 0.13,0.21z" />
                                            <path class="fil0"
                                                d="M102.28 197.85l-2.76 2.76c-0.56,-0.69 -1.55,-1.25 -3.02,-1.9 -0.17,-0.09 -0.22,-0.3 -0.65,-0.86l6.42 0z" />
                                            <path class="fil4"
                                                d="M297.26 270.83c-6.38,10.61 -12.85,21.21 -19.35,31.81l-27.85 -27.85c4.18,-6.86 8.36,-13.75 12.5,-20.65 2.33,-3.88 4.4,-7.8 6.25,-11.81l28.45 28.49z" />
                                            <path class="fil4"
                                                d="M265.66 239.24l-51.17 0 -41.38 -41.38 51.17 0 3.15 3.15c-0.3,0.52 -0.39,1.08 -0.35,1.72 0.39,7.89 3.79,14.92 13.62,15.87 1.68,0.13 3.23,0.26 4.66,0.34l20.3 20.31z" />
                                            <path class="fil4"
                                                d="M76.98 274.37l-27.89 27.89c-6.47,-10.65 -12.93,-21.25 -19.35,-31.86l28.54 -28.54c1.9,4.14 4.05,8.23 6.47,12.28 4.05,6.73 8.15,13.49 12.24,20.22z" />
                                            <path class="fil4"
                                                d="M153.45 197.85l-41.39 41.38 -51.17 0 20.18 -20.17c0.56,0 1.12,0 1.68,-0.04 8.84,-0.35 15.61,-3.02 17.29,-13.71 0.35,-2.33 0.35,-3.66 -0.52,-4.7l2.76 -2.76 51.17 0z" />
                                            <path class="fil4"
                                                d="M200.1 173.67c-4.1,0.04 -8.19,0.04 -12.24,0.04 -20.48,-0.04 -40.91,-0.04 -61.39,-0.04l19.05 -19.05c3.45,0.17 6.94,0.21 10.43,0.04 8.36,-0.43 16.73,0.3 25.09,-0.04l19.05 19.05z" />
                                            <path class="fil5"
                                                d="M60.9 239.24l-3.79 0c0.39,0.9 0.77,1.77 1.16,2.63l-28.54 28.54c-1.98,-3.36 -4.01,-6.68 -6.04,-10.04 -4.18,-6.94 -7.76,-14.01 -10.78,-21.12 -0.35,-0.78 -0.65,-1.51 -0.95,-2.28l48.41 -48.41c0.13,5.56 0.22,11.12 0.22,16.73 0,4.57 1.68,8.11 5.3,10.78 0.69,0.56 1.34,1.25 2.07,1.6 1.38,0.56 2.85,1.25 4.27,1.38 2.97,0.13 5.91,0.13 8.84,0.04l-20.18 20.17z" />
                                            <path class="fil5"
                                                d="M145.52 154.62l-19.05 19.05 -5.6 0c-0.82,0 -1.64,0.04 -2.46,0.13 -4.87,0.69 -7.29,-0.35 -9.7,-4.53 -1.42,-2.54 -3.62,-3.84 -6.34,-4.31 -1.72,-0.3 -3.49,-0.47 -5.21,-0.52 -4.18,-0.09 -8.36,-0.13 -12.5,-0.17l17.46 -17.42c1.12,0.69 2.24,1.42 3.36,2.24 2.29,1.68 4.79,2.76 7.68,2.97 3.96,0.22 7.93,0.6 11.9,0.86 6.81,0.47 13.62,1.33 20.48,1.68z" />
                                            <path class="fil5"
                                                d="M315.11 237.43c-0.22,0.61 -0.48,1.21 -0.73,1.81 -3.02,7.11 -6.6,14.18 -10.78,21.12 -2.11,3.49 -4.22,6.98 -6.34,10.47l-28.45 -28.49c0.48,-1.04 0.95,-2.07 1.38,-3.1l-4.53 0 -20.3 -20.31c4.44,0.3 7.5,0.35 8.49,0.13 2.46,-0.43 4.53,-0.82 6.77,-2.33 3.53,-2.41 4.92,-5.78 5.39,-6.81 1.04,-2.42 0.99,-5.43 1.04,-8.19 0.09,-4.1 0.09,-8.19 0.09,-12.24l47.98 47.94z" />
                                            <path class="fil5"
                                                d="M196 118.36c-1.38,0.17 -2.76,0.3 -4.14,0.39 -9.36,0.65 -18.79,0.6 -28.19,0.86l0 -0.22c-5.82,0 -11.64,0.26 -17.46,-0.09 -5.09,-0.3 -10.17,-0.82 -15.26,-1.34l32.33 -32.33 32.72 32.72z" />
                                            <path class="fil5"
                                                d="M242.04 164.4l-10 0c-2.37,0.04 -4.78,0.08 -7.03,0.6 -1.85,0.47 -4.4,1.25 -5.09,2.63 -2.93,5.82 -7.46,7.24 -13.36,6.03 -0.13,-0.04 -0.3,0 -0.43,0l-6.03 0 -19.05 -19.05c1.86,-0.04 3.71,-0.17 5.52,-0.39 8.54,-0.86 17.16,-1.29 25.69,-1.94 3.58,-0.22 6.86,-1.12 9.87,-3.28 0.86,-0.65 1.76,-1.25 2.67,-1.86l17.24 17.25z" />
                                            <path class="fil6"
                                                d="M325.93 197.08c-1.77,13.49 -5.3,27.07 -10.82,40.35l-47.98 -47.94c0,-3.75 -0.04,-7.46 -0.04,-11.17 0,-3.1 -0.47,-6.25 -0.26,-9.35 0.3,-3.79 -0.99,-5.26 -4.87,-4.96 -1.85,0.22 -3.75,0.35 -5.69,0.39l-14.23 0 -17.24 -17.25c6.42,-4.22 13.4,-7.24 21.12,-8.58 3.88,-0.69 7.85,-0.99 11.77,-1.47 -0.04,-3.32 -1.72,-7.46 -4.14,-9.91 -1.47,-1.46 -2.93,-2.93 -4.4,-4.35 -1.64,-1.68 -2.41,-3.36 -2.33,-4.87l79.1 79.1z" />
                                            <path class="fil6"
                                                d="M106.38 84.09c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47zm0 0c-4.57,4.48 -8.02,10 -10.35,16 -0.3,0.78 -0.6,1.59 -0.82,2.41l23.88 -23.88c-4.74,0.61 -9.14,2.03 -12.72,5.47z" />
                                            <path class="fil6"
                                                d="M232.6 103.75l-25.09 -25.09 0.22 0c6.98,0.43 12.54,3.54 16.55,9.18 3.54,4.91 6.72,10.04 8.32,15.91z" />
                                            <path class="fil6"
                                                d="M233.63 109.18c0.13,3.79 -1.04,5.56 -4.74,6.25 -3.54,0.65 -7.16,1.34 -10.69,1.21 -7.5,-0.3 -14.83,0.99 -22.2,1.72l-32.72 -32.72 -32.33 32.33c-2.59,-0.26 -5.17,-0.52 -7.76,-0.78 -1.6,-0.13 -3.19,-0.34 -4.79,-0.43 -5.95,-0.35 -11.85,-0.61 -17.8,-0.95 -1.16,-0.09 -2.33,-0.34 -3.41,-0.78 -2.54,-0.86 -3.79,-2.33 -3.45,-4.96 0.35,-2.54 0.78,-5.13 1.47,-7.59l23.88 -23.88c0.82,-0.13 1.64,-0.21 2.46,-0.26 7.97,-0.6 15.91,-1.42 23.93,-1.77 8.88,-0.39 17.76,-0.65 26.68,-0.43 7.67,0.17 15.35,0.99 23.06,1.6 4.05,0.26 8.19,0.69 12.28,0.9l25.09 25.09 0 0.04c0.26,0.82 0.43,1.68 0.61,2.54 0.21,0.95 0.39,1.9 0.43,2.84z" />
                                            <path class="fil6"
                                                d="M102.11 146.86l-17.46 17.42c-6.72,-0.09 -13.45,-0.17 -20.13,-0.26 -2.63,0 -4.22,1.16 -4.27,3.19 -0.04,3.23 -0.09,6.42 -0.09,9.66 0.04,3.88 0.13,7.76 0.22,11.68l-48.41 48.41c-5.43,-13.32 -8.97,-26.94 -10.69,-40.48l79.06 -79.1c0.04,0.04 0.04,0.09 0.04,0.13 0.61,2.98 -1.38,4.79 -3.23,6.55 -0.21,0.21 -0.47,0.39 -0.69,0.56 -4.05,3.19 -6.38,7.37 -6.98,12.42 0.3,0.17 0.43,0.3 0.56,0.3 0.34,0.04 0.69,0.09 1.12,0.09 11.25,0.26 21.55,3.49 30.95,9.44z" />
                                            <path class="fil6"
                                                d="M201.05 72.19c-9.23,-0.73 -18.45,-1.25 -27.68,-1.25 -15.6,0.04 -31.12,0.86 -46.73,1.16 -0.34,0 -0.73,0 -1.08,0.04l37.72 -37.72 37.76 37.76z" />
                                            <path class="fil7"
                                                d="M324.03 143.97l-128.33 -128.33c67.03,13.02 115.62,66.13 128.33,128.33z" />
                                            <path class="fil7"
                                                d="M130.69 15.81l-127.26 127.26c12.93,-61.56 61,-114.02 127.26,-127.26z" />
                                            <path class="fil8"
                                                d="M327.31 176.3c0,6.9 -0.43,13.84 -1.38,20.78l-79.1 -79.1c0.04,-1.98 1.68,-3.71 4.7,-4.61 3.28,-0.99 6.72,-1.47 10.13,-1.98 4.35,-0.69 5.91,-2.42 5.91,-6.9 0,-2.24 -1.03,-3.79 -3.1,-4.57 -1.94,-0.73 -3.88,-1.34 -5.91,-1.86 -5.09,-1.34 -9.4,-0.69 -12.37,4.36 -1.25,2.2 -5.39,1.9 -6.64,-0.26 -2.46,-4.27 -4.74,-8.66 -7.46,-12.76 -6.34,-9.53 -15,-15.86 -26.64,-16.86 -1.47,-0.13 -2.93,-0.26 -4.4,-0.35l-37.76 -37.76 -37.72 37.72c-11.81,0.52 -21.43,5.21 -28.45,14.87 -3.28,4.48 -5.86,9.48 -8.71,14.27 -2.11,3.49 -5.69,3.62 -7.97,0.17 -1.68,-2.63 -4.14,-4.4 -7.11,-3.97 -3.79,0.52 -7.59,1.64 -11.21,2.93 -1.98,0.69 -2.63,3.02 -2.24,5.47 0.48,3.02 1.72,4.7 3.96,5.13 3.79,0.69 7.59,1.25 11.3,2.07 2.42,0.56 4.61,1.55 5.21,4.27l-79.06 79.1c-2.28,-18.06 -1.47,-36.08 2.15,-53.41l127.26 -127.26c10.56,-2.11 21.56,-3.23 32.94,-3.23 11.08,0 21.77,1.03 32.07,3.06l128.33 128.33c2.15,10.56 3.28,21.38 3.28,32.33z" />
                                            <polygon class="fil9"
                                                points="214.49,239.24 112.07,239.24 153.45,197.85 173.11,197.85 " />
                                            <path class="fil9"
                                                d="M277.91 302.65c-6.38,10.48 -12.85,20.99 -19.36,31.51l-27.8 -27.81c6.51,-10.52 12.93,-21.04 19.31,-31.56l27.85 27.85z" />
                                            <path class="fil9"
                                                d="M96.42 306.1l-27.85 27.85c-6.55,-10.56 -13.06,-21.12 -19.49,-31.68l27.89 -27.89c6.42,10.56 12.89,21.17 19.44,31.73z" />
                                            <polygon class="fil7" points="388.16,0 388.44,8.34 387.88,8.34 " />
                                            <polygon class="fil7"
                                                points="388.93,25.45 389.35,42.55 386.96,42.55 387.39,25.45 " />
                                            <polygon class="fil8"
                                                points="389.78,59.65 390.1,76.76 386.22,76.76 386.53,59.65 " />
                                            <polygon class="fil5"
                                                points="390.41,93.86 390.64,110.96 385.68,110.96 385.91,93.86 " />
                                            <polygon class="fil9"
                                                points="390.86,128.07 391.04,145.17 385.28,145.17 385.45,128.07 " />
                                            <polygon class="fil9"
                                                points="391.18,162.28 391.31,179.38 385.01,179.38 385.14,162.28 " />
                                            <polygon class="fil1"
                                                points="391.38,196.48 391.43,213.59 384.89,213.59 384.94,196.48 " />
                                            <polygon class="fil1"
                                                points="391.47,230.69 391.47,247.79 384.85,247.79 384.85,230.69 " />
                                            <polygon class="fil1"
                                                points="391.43,264.9 391.38,282 384.93,282 384.89,264.9 " />
                                            <polygon class="fil9"
                                                points="391.32,299.1 391.18,316.21 385.14,316.21 385,299.1 " />
                                            <polygon class="fil5"
                                                points="391.05,333.31 390.87,350.42 385.45,350.42 385.27,333.31 " />
                                            <polygon class="fil5"
                                                points="390.65,367.52 390.42,384.63 385.9,384.63 385.67,367.52 " />
                                            <polygon class="fil7"
                                                points="390.11,401.73 389.79,418.83 386.53,418.83 386.21,401.73 " />
                                            <polygon class="fil7"
                                                points="389.36,435.94 388.93,453.04 387.39,453.04 386.96,435.94 " />
                                            <polygon class="fil7"
                                                points="388.44,470.15 388.16,478.49 387.88,470.15 " />
                                            <polygon class="fil9"
                                                points="583.2,127.23 558.76,127.23 527.85,216.02 497.26,127.23 472.78,127.23 449.91,254.53 474.43,254.53 488.9,174.14 516.72,254.53 538.86,254.53 566.92,174.14 581.07,254.53 605.35,254.53 " />
                                            <polygon class="fil9"
                                                points="693.5,133.18 680.35,165.54 696.15,204.69 660.86,204.69 678.55,161 691.69,128.6 691.12,127.23 665.64,127.23 614.75,254.53 640.84,254.53 651.61,228.32 705.47,228.32 715.81,254.53 741.93,254.53 " />
                                            <path class="fil9"
                                                d="M829.8 206.82c-2.13,-4.54 -5.75,-9.29 -10.86,-14.23 -2.05,-2.05 -7.84,-6.91 -17.44,-14.63 -10.25,-8.36 -16.4,-13.82 -18.41,-16.36 -1.53,-1.89 -2.25,-3.94 -2.25,-6.07 0,-2.13 1.05,-4.06 3.14,-5.75 2.09,-1.69 4.79,-2.57 8.08,-2.57 6.8,0 13.42,4.42 19.98,13.18l18.61 -15.84c-6.95,-7.8 -13.42,-13.18 -19.37,-16.12 -5.95,-2.94 -12.22,-4.42 -18.81,-4.42 -10.25,0 -18.85,3.17 -25.85,9.49 -7,6.31 -10.45,13.91 -10.45,22.71 0,6.15 2.09,12.26 6.27,18.41 4.22,6.15 13.51,14.87 27.9,26.17 7.52,5.95 12.42,10.37 14.63,13.26 2.21,2.89 3.34,5.75 3.34,8.64 0,3.17 -1.49,5.99 -4.42,8.4 -2.94,2.41 -6.55,3.62 -10.85,3.62 -8.28,0 -15.6,-5.63 -21.95,-16.88l-21.15 12.3c4.99,9.53 10.97,16.52 17.93,20.94 7,4.46 15.2,6.67 24.6,6.67 12.02,0 21.78,-3.42 29.3,-10.21 7.48,-6.79 11.21,-15.43 11.21,-25.88 0,-5.35 -1.08,-10.29 -3.17,-14.83z" />
                                            <path class="fil9"
                                                d="M925.39 206.82c-2.13,-4.54 -5.75,-9.29 -10.86,-14.23 -2.05,-2.05 -7.84,-6.91 -17.44,-14.63 -10.25,-8.36 -16.4,-13.82 -18.41,-16.36 -1.53,-1.89 -2.25,-3.94 -2.25,-6.07 0,-2.13 1.05,-4.06 3.14,-5.75 2.09,-1.69 4.78,-2.57 8.08,-2.57 6.79,0 13.43,4.42 19.98,13.18l18.61 -15.84c-6.95,-7.8 -13.42,-13.18 -19.37,-16.12 -5.95,-2.94 -12.22,-4.42 -18.82,-4.42 -10.25,0 -18.85,3.17 -25.84,9.49 -6.99,6.31 -10.45,13.91 -10.45,22.71 0,6.15 2.09,12.26 6.27,18.41 4.22,6.15 13.51,14.87 27.9,26.17 7.56,5.95 12.42,10.37 14.63,13.26 2.21,2.89 3.34,5.75 3.34,8.64 0,3.17 -1.49,5.99 -4.42,8.4 -2.93,2.41 -6.55,3.62 -10.85,3.62 -8.28,0 -15.6,-5.63 -21.95,-16.88l-21.1 12.3c4.94,9.53 10.94,16.52 17.93,20.94 6.95,4.46 15.16,6.67 24.56,6.67 12.02,0 21.79,-3.42 29.3,-10.21 7.48,-6.79 11.21,-15.43 11.21,-25.88 0,-5.35 -1.08,-10.29 -3.17,-14.83z" />
                                            <polygon class="fil9"
                                                points="939.49,127.23 939.49,151.11 962.93,151.11 962.93,254.53 988.42,254.53 988.42,151.11 1012.5,151.11 1012.5,127.23 " />
                                            <path class="fil1"
                                                d="M553.41 315.91c7.22,-0.06 12.89,-0.97 17.02,-2.69 4.07,-1.77 7.27,-4.35 9.45,-7.79 2.24,-3.44 3.32,-7.39 3.32,-11.92 0,-5.44 -1.6,-10.03 -4.81,-13.75 -3.21,-3.72 -7.34,-6.13 -12.49,-7.28 -3.38,-0.74 -9.86,-1.09 -19.42,-1.09l-18.85 0 0 83.07 8.59 0 0 -74.93 16.9 0c5.9,0 10.08,0.46 12.66,1.43 2.52,0.97 4.59,2.63 6.13,4.93 1.6,2.23 2.35,4.76 2.35,7.56 0,2.86 -0.74,5.44 -2.29,7.79 -1.55,2.29 -3.73,4.01 -6.48,5.04 -2.75,1.03 -6.99,1.6 -12.72,1.6l-16.56 -0.11 6.53 8.13 31 38.56 10.65 0 -30.99 -38.56z" />
                                            <polygon class="fil1"
                                                points="624.39,354.47 633.04,354.47 633.04,271.4 624.39,271.4 " />
                                            <path class="fil1"
                                                d="M742.28 289.05c-4.7,-6.93 -11.23,-11.86 -19.59,-14.66 -5.84,-2.01 -15.18,-2.98 -28.07,-2.98l-17.88 0 0 83.07 27.44 0c10.71,0 19.07,-1.49 25.03,-4.53 5.96,-2.98 10.83,-7.68 14.55,-13.98 3.73,-6.36 5.56,-13.69 5.56,-22 0,-9.62 -2.35,-17.93 -7.05,-24.92zm-7.22 44.46l0 0c-3.72,5.27 -8.82,8.94 -15.29,11 -4.64,1.43 -12.89,2.12 -24.81,2.12l-9.97 0 0 -67.08 6.13 0c12.37,0 21.25,0.74 26.64,2.35 7.22,2.12 12.77,6.02 16.84,11.69 4.01,5.67 6.02,12.54 6.02,20.56 0,7.62 -1.89,14.1 -5.56,19.37z" />
                                            <polygon class="fil1"
                                                points="839.51,279.54 839.51,271.4 790.12,271.4 790.12,354.47 839.16,354.47 839.16,346.33 798.71,346.33 798.71,313.68 839.16,313.68 839.16,305.54 798.71,305.54 798.71,279.54 " />
                                            <path class="fil1"
                                                d="M869.7 339.61l7.49 -4.33c5.28,9.37 11.38,14.05 18.3,14.05 2.95,0 5.74,-0.65 8.33,-1.98 2.6,-1.33 4.58,-3.12 5.94,-5.35 1.35,-2.23 2.04,-4.62 2.04,-7.12 0,-2.85 -1,-5.64 -3,-8.39 -2.75,-3.77 -7.8,-8.33 -15.11,-13.64 -7.36,-5.37 -11.94,-9.24 -13.74,-11.62 -3.12,-4.02 -4.67,-8.35 -4.67,-13.01 0,-3.71 0.92,-7.08 2.76,-10.12 1.84,-3.06 4.43,-5.45 7.77,-7.22 3.34,-1.75 6.96,-2.62 10.88,-2.62 4.15,0 8.05,0.98 11.67,2.96 3.62,2 7.45,5.66 11.48,10.97l-7.2 5.27c-3.32,-4.25 -6.15,-7.04 -8.48,-8.39 -2.34,-1.35 -4.89,-2.02 -7.64,-2.02 -3.56,0 -6.48,1.04 -8.73,3.12 -2.26,2.08 -3.4,4.64 -3.4,7.7 0,1.85 0.4,3.64 1.21,5.37 0.8,1.73 2.26,3.62 4.38,5.68 1.16,1.08 4.95,3.91 11.39,8.48 7.64,5.45 12.87,10.28 15.72,14.53 2.84,4.23 4.26,8.5 4.26,12.78 0,6.18 -2.43,11.53 -7.28,16.09 -4.86,4.54 -10.77,6.81 -17.72,6.81 -5.36,0 -10.21,-1.37 -14.57,-4.14 -4.36,-2.75 -8.37,-7.37 -12.06,-13.86z" />
                                            <path class="fil10"
                                                d="M255.72 148.97c0,0 -1.51,7.1 -6.47,8.38 -4.96,1.28 -24.61,2.59 -24.61,2.59l24.63 -4.37c0,0 2.76,-0.41 6.46,-6.6zm-37.43 14.01c9.83,-1.67 21.39,-2.18 29.26,-3.33 0.71,-0.1 1.47,-0.32 2.25,-0.64 0.31,-0.12 0.62,-0.27 0.92,-0.42 2.95,-1.5 5.81,-4.36 6.3,-7.89 0.71,-5.12 0.78,-11.77 0.79,-13.55 -2.48,1.05 -6.02,2.67 -10.19,4.88 -7.49,3.98 -18.6,10.83 -29.33,20.94z" />
                                            <path class="fil11"
                                                d="M224.64 159.95c0,0 19.65,-1.31 24.61,-2.59 4.97,-1.28 6.47,-8.38 6.47,-8.38 -3.7,6.19 -6.46,6.6 -6.46,6.6l-24.63 4.37z" />
                                            <path class="fil10"
                                                d="M71.73 148.97c0,0 1.51,7.1 6.47,8.38 4.96,1.28 24.61,2.59 24.61,2.59l-24.63 -4.37c0,0 -2.76,-0.41 -6.46,-6.6zm37.43 14.01c-9.83,-1.67 -21.39,-2.18 -29.26,-3.33 -0.71,-0.1 -1.47,-0.32 -2.25,-0.64 -0.31,-0.12 -0.62,-0.27 -0.92,-0.42 -2.95,-1.5 -5.81,-4.36 -6.3,-7.89 -0.71,-5.12 -0.78,-11.77 -0.79,-13.55 2.49,1.05 6.02,2.67 10.19,4.88 7.49,3.98 18.6,10.83 29.33,20.94z" />
                                            <path class="fil11"
                                                d="M102.81 159.95c0,0 -19.65,-1.31 -24.61,-2.59 -4.97,-1.28 -6.47,-8.38 -6.47,-8.38 3.7,6.19 6.46,6.6 6.46,6.6l24.63 4.37z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            {{-- logo svg end --}}
                            <div class="bg-white p-4" style="border-radius:10px;">
                                @include('partials.alerts')
                                <div class="text-center ">
                                    <h5 class="font-weight-bold text-green">Edit Customer</h5>
                                </div>
                                {{-- name --}}
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Full Name</label>
                                    <input type="text"
                                        class="form-control {{ $errors->first('name') ? 'is-invalid ' : '' }}"
                                        value="{{ old('name',$editcustomer->name) }}" name="name" placeholder="Noman Shaukat">
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                </div>
                                   {{-- email --}}
                                   <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Email</label>
                                    <input type="email"
                                        class="form-control {{ $errors->first('email') ? 'is-invalid ' : '' }}"
                                        value="{{ old('email',$editcustomer->email) }}" name="email" placeholder="abc@gmail.com">
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                </div>
                                  {{-- phone --}}
                                  <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Phone</label>
                                    <input type="number"
                                        class="form-control {{ $errors->first('phone') ? 'is-invalid ' : '' }}"
                                        value="{{ old('phone',$editcustomer->phone) }}" name="phone" maxlength="11" placeholder="03012345678">
                                    <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
                                </div>
                                  {{-- Country --}}
                                  <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Country</label>
                                    <select class="form-control" name='country'>
                                        <option value="Pakistan" selected>Pakistan</option>
                                    </select>
                                    <span class="invalid-feedback">{{ $errors->first('country') }}</span>
                                </div>
                                {{-- State --}}
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black"> Select State</label>
                                    <select class="form-control  {{ $errors->first('state') ? 'is-invalid ' : '' }}" name="state">
                                        <option value='' disabled selected>Select State</option>
                                        <option value="Sindh" @if($editcustomer->state == 'Sindh') selected @endif>Sindh</option>
                                        <option value="Punjab" @if($editcustomer->state == 'Punjab') selected @endif>Punjab</option>
                                        <option value="Khyber Pakhtunkhwa" @if($editcustomer->state == 'Khyber Pakhtunkhwa') selected @endif>Khyber Pakhtunkhwa</option>
                                        <option value="Balochistan" @if($editcustomer->state == 'Balochistan') selected @endif>Balochistan</option>
                                        <option value="Gilgit-Baltistan" @if($editcustomer->state == 'Gilgit-Baltistan') selected @endif>Gilgit-Baltistan</option>
                                    </select>
                                    <span class="invalid-feedback">{{ $errors->first('state') }}</span>
                                </div>
                                {{-- City --}}
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black"> Select City</label>
                                    <select class="js-example-basic-single form-control  {{ $errors->first('city') ? 'is-invalid ' : '' }}" name="city" >
                                        <option value="" disabled selected>Select City</option>
                                        <option value="Islamabad">Islamabad</option>
                                        <option value="" disabled>Punjab Cities</option>
                                        <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                        <option value="Ahmadpur East">Ahmadpur East</option>
                                        <option value="Ali Khan Abad">Ali Khan Abad</option>
                                        <option value="Alipur">Alipur</option>
                                        <option value="Arifwala">Arifwala</option>
                                        <option value="Attock">Attock</option>
                                        <option value="Bhera">Bhera</option>
                                        <option value="Bhalwal">Bhalwal</option>
                                        <option value="Bahawalnagar">Bahawalnagar</option>
                                        <option value="Bahawalpur">Bahawalpur</option>
                                        <option value="Bhakkar">Bhakkar</option>
                                        <option value="Burewala">Burewala</option>
                                        <option value="Chillianwala">Chillianwala</option>
                                        <option value="Chakwal">Chakwal</option>
                                        <option value="Chichawatni">Chichawatni</option>
                                        <option value="Chiniot">Chiniot</option>
                                        <option value="Chishtian">Chishtian</option>
                                        <option value="Daska">Daska</option>
                                        <option value="Darya Khan">Darya Khan</option>
                                        <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                        <option value="Dhaular">Dhaular</option>
                                        <option value="Dina">Dina</option>
                                        <option value="Dinga">Dinga</option>
                                        <option value="Dipalpur">Dipalpur</option>
                                        <option value="Faisalabad">Faisalabad</option>
                                        <option value="Ferozewala">Ferozewala</option>
                                        <option value="Fateh Jhang">Fateh Jang</option>
                                        <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                        <option value="Gojra">Gojra</option>
                                        <option value="Gujranwala">Gujranwala</option>
                                        <option value="Gujrat">Gujrat</option>
                                        <option value="Gujar Khan">Gujar Khan</option>
                                        <option value="Hafizabad">Hafizabad</option>
                                        <option value="Haroonabad">Haroonabad</option>
                                        <option value="Hasilpur">Hasilpur</option>
                                        <option value="Haveli Lakha">Haveli Lakha</option>
                                        <option value="Jatoi">Jatoi</option>
                                        <option value="Jalalpur">Jalalpur</option>
                                        <option value="Jattan">Jattan</option>
                                        <option value="Jampur">Jampur</option>
                                        <option value="Jaranwala">Jaranwala</option>
                                        <option value="Jhang">Jhang</option>
                                        <option value="Jhelum">Jhelum</option>
                                        <option value="Kalabagh">Kalabagh</option>
                                        <option value="Karor Lal Esan">Karor Lal Esan</option>
                                        <option value="Kasur">Kasur</option>
                                        <option value="Kamalia">Kamalia</option>
                                        <option value="Kamoke">Kamoke</option>
                                        <option value="Khanewal">Khanewal</option>
                                        <option value="Khanpur">Khanpur</option>
                                        <option value="Kharian">Kharian</option>
                                        <option value="Khushab">Khushab</option>
                                        <option value="Kot Addu">Kot Addu</option>
                                        <option value="Jauharabad">Jauharabad</option>
                                        <option value="Lahore">Lahore</option>
                                        <option value="Lalamusa">Lalamusa</option>
                                        <option value="Layyah">Layyah</option>
                                        <option value="Liaquat Pur">Liaquat Pur</option>
                                        <option value="Lodhran">Lodhran</option>
                                        <option value="Malakwal">Malakwal</option>
                                        <option value="Mamoori">Mamoori</option>
                                        <option value="Mailsi">Mailsi</option>
                                        <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                        <option value="Mian Channu">Mian Channu</option>
                                        <option value="Mianwali">Mianwali</option>
                                        <option value="Multan">Multan</option>
                                        <option value="Murree">Murree</option>
                                        <option value="Muridke">Muridke</option>
                                        <option value="Mianwali Bangla">Mianwali Bangla</option>
                                        <option value="Muzaffargarh">Muzaffargarh</option>
                                        <option value="Narowal">Narowal</option>
                                        <option value="Nankana Sahib">Nankana Sahib</option>
                                        <option value="Okara">Okara</option>
                                        <option value="Renala Khurd">Renala Khurd</option>
                                        <option value="Pakpattan">Pakpattan</option>
                                        <option value="Pattoki">Pattoki</option>
                                        <option value="Pir Mahal">Pir Mahal</option>
                                        <option value="Qaimpur">Qaimpur</option>
                                        <option value="Qila Didar Singh">Qila Didar Singh</option>
                                        <option value="Rabwah">Rabwah</option>
                                        <option value="Raiwind">Raiwind</option>
                                        <option value="Rajanpur">Rajanpur</option>
                                        <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                        <option value="Rawalpindi">Rawalpindi</option>
                                        <option value="Sadiqabad">Sadiqabad</option>
                                        <option value="Safdarabad">Safdarabad</option>
                                        <option value="Sahiwal">Sahiwal</option>
                                        <option value="Sangla Hill">Sangla Hill</option>
                                        <option value="Sarai Alamgir">Sarai Alamgir</option>
                                        <option value="Sargodha">Sargodha</option>
                                        <option value="Shakargarh">Shakargarh</option>
                                        <option value="Sheikhupura">Sheikhupura</option>
                                        <option value="Sialkot">Sialkot</option>
                                        <option value="Sohawa">Sohawa</option>
                                        <option value="Soianwala">Soianwala</option>
                                        <option value="Siranwali">Siranwali</option>
                                        <option value="Talagang">Talagang</option>
                                        <option value="Taxila">Taxila</option>
                                        <option value="Toba Tek Singh">Toba Tek Singh</option>
                                        <option value="Vehari">Vehari</option>
                                        <option value="Wah Cantonment">Wah Cantonment</option>
                                        <option value="Wazirabad">Wazirabad</option>
                                        <option value="" disabled>Sindh Cities</option>
                                        <option value="Badin">Badin</option>
                                        <option value="Bhirkan">Bhirkan</option>
                                        <option value="Rajo Khanani">Rajo Khanani</option>
                                        <option value="Chak">Chak</option>
                                        <option value="Dadu">Dadu</option>
                                        <option value="Digri">Digri</option>
                                        <option value="Diplo">Diplo</option>
                                        <option value="Dokri">Dokri</option>
                                        <option value="Ghotki">Ghotki</option>
                                        <option value="Haala">Haala</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Islamkot">Islamkot</option>
                                        <option value="Jacobabad">Jacobabad</option>
                                        <option value="Jamshoro">Jamshoro</option>
                                        <option value="Jungshahi">Jungshahi</option>
                                        <option value="Kandhkot">Kandhkot</option>
                                        <option value="Kandiaro">Kandiaro</option>
                                        <option value="Karachi">Karachi</option>
                                        <option value="Kashmore">Kashmore</option>
                                        <option value="Keti Bandar">Keti Bandar</option>
                                        <option value="Khairpur">Khairpur</option>
                                        <option value="Kotri">Kotri</option>
                                        <option value="Larkana">Larkana</option>
                                        <option value="Matiari">Matiari</option>
                                        <option value="Mehar">Mehar</option>
                                        <option value="Mirpur Khas">Mirpur Khas</option>
                                        <option value="Mithani">Mithani</option>
                                        <option value="Mithi">Mithi</option>
                                        <option value="Mehrabpur">Mehrabpur</option>
                                        <option value="Moro">Moro</option>
                                        <option value="Nagarparkar">Nagarparkar</option>
                                        <option value="Naudero">Naudero</option>
                                        <option value="Naushahro Feroze">Naushahro Feroze</option>
                                        <option value="Naushara">Naushara</option>
                                        <option value="Nawabshah">Nawabshah</option>
                                        <option value="Nazimabad">Nazimabad</option>
                                        <option value="Qambar">Qambar</option>
                                        <option value="Qasimabad">Qasimabad</option>
                                        <option value="Ranipur">Ranipur</option>
                                        <option value="Ratodero">Ratodero</option>
                                        <option value="Rohri">Rohri</option>
                                        <option value="Sakrand">Sakrand</option>
                                        <option value="Sanghar">Sanghar</option>
                                        <option value="Shahbandar">Shahbandar</option>
                                        <option value="Shahdadkot">Shahdadkot</option>
                                        <option value="Shahdadpur">Shahdadpur</option>
                                        <option value="Shahpur Chakar">Shahpur Chakar</option>
                                        <option value="Shikarpaur">Shikarpaur</option>
                                        <option value="Sukkur">Sukkur</option>
                                        <option value="Tangwani">Tangwani</option>
                                        <option value="Tando Adam Khan">Tando Adam Khan</option>
                                        <option value="Tando Allahyar">Tando Allahyar</option>
                                        <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                        <option value="Thatta">Thatta</option>
                                        <option value="Umerkot">Umerkot</option>
                                        <option value="Warah">Warah</option>
                                        <option value="" disabled>Khyber Cities</option>
                                        <option value="Abbottabad">Abbottabad</option>
                                        <option value="Adezai">Adezai</option>
                                        <option value="Alpuri">Alpuri</option>
                                        <option value="Akora Khattak">Akora Khattak</option>
                                        <option value="Ayubia">Ayubia</option>
                                        <option value="Banda Daud Shah">Banda Daud Shah</option>
                                        <option value="Bannu">Bannu</option>
                                        <option value="Batkhela">Batkhela</option>
                                        <option value="Battagram">Battagram</option>
                                        <option value="Birote">Birote</option>
                                        <option value="Chakdara">Chakdara</option>
                                        <option value="Charsadda">Charsadda</option>
                                        <option value="Chitral">Chitral</option>
                                        <option value="Daggar">Daggar</option>
                                        <option value="Dargai">Dargai</option>
                                        <option value="Darya Khan">Darya Khan</option>
                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                        <option value="Doaba">Doaba</option>
                                        <option value="Dir">Dir</option>
                                        <option value="Drosh">Drosh</option>
                                        <option value="Hangu">Hangu</option>
                                        <option value="Haripur">Haripur</option>
                                        <option value="Karak">Karak</option>
                                        <option value="Kohat">Kohat</option>
                                        <option value="Kulachi">Kulachi</option>
                                        <option value="Lakki Marwat">Lakki Marwat</option>
                                        <option value="Latamber">Latamber</option>
                                        <option value="Madyan">Madyan</option>
                                        <option value="Mansehra">Mansehra</option>
                                        <option value="Mardan">Mardan</option>
                                        <option value="Mastuj">Mastuj</option>
                                        <option value="Mingora">Mingora</option>
                                        <option value="Nowshera">Nowshera</option>
                                        <option value="Paharpur">Paharpur</option>
                                        <option value="Pabbi">Pabbi</option>
                                        <option value="Peshawar">Peshawar</option>
                                        <option value="Saidu Sharif">Saidu Sharif</option>
                                        <option value="Shorkot">Shorkot</option>
                                        <option value="Shewa Adda">Shewa Adda</option>
                                        <option value="Swabi">Swabi</option>
                                        <option value="Swat">Swat</option>
                                        <option value="Tangi">Tangi</option>
                                        <option value="Tank">Tank</option>
                                        <option value="Thall">Thall</option>
                                        <option value="Timergara">Timergara</option>
                                        <option value="Tordher">Tordher</option>
                                        <option value="" disabled>Balochistan Cities</option>
                                        <option value="Awaran">Awaran</option>
                                        <option value="Barkhan">Barkhan</option>
                                        <option value="Chagai">Chagai</option>
                                        <option value="Dera Bugti">Dera Bugti</option>
                                        <option value="Gwadar">Gwadar</option>
                                        <option value="Harnai">Harnai</option>
                                        <option value="Jafarabad">Jafarabad</option>
                                        <option value="Jhal Magsi">Jhal Magsi</option>
                                        <option value="Kacchi">Kacchi</option>
                                        <option value="Kalat">Kalat</option>
                                        <option value="Kech">Kech</option>
                                        <option value="Kharan">Kharan</option>
                                        <option value="Khuzdar">Khuzdar</option>
                                        <option value="Killa Abdullah">Killa Abdullah</option>
                                        <option value="Killa Saifullah">Killa Saifullah</option>
                                        <option value="Kohlu">Kohlu</option>
                                        <option value="Lasbela">Lasbela</option>
                                        <option value="Lehri">Lehri</option>
                                        <option value="Loralai">Loralai</option>
                                        <option value="Mastung">Mastung</option>
                                        <option value="Musakhel">Musakhel</option>
                                        <option value="Nasirabad">Nasirabad</option>
                                        <option value="Nushki">Nushki</option>
                                        <option value="Panjgur">Panjgur</option>
                                        <option value="Pishin Valley">Pishin Valley</option>
                                        <option value="Quetta">Quetta</option>
                                        <option value="Sherani">Sherani</option>
                                        <option value="Sibi">Sibi</option>
                                        <option value="Sohbatpur">Sohbatpur</option>
                                        <option value="Washuk">Washuk</option>
                                        <option value="Zhob">Zhob</option>
                                        <option value="Ziarat">Ziarat</option>
                                      </select>
                                    <span class="invalid-feedback">{{ $errors->first('city') }}</span>
                                </div>
                                <div class="form-group">
                                    <div class=" d-flex d-inline justify-content-end ">
                                        <button type="button" class="btn bg-secondary btn-sm rounded-0 text-white mr-1"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn bg-green btn-sm rounded-0 text-white ml-1"><i
                                                class="fas fa-plus fa-sm text-white pr-2 "></i>Update Customer</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
