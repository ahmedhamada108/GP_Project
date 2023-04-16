@extends('layouts.app')
@section('content')
    <!-- landing -->
    <div class="landing resetpassword">  
        <div class="container">
            <div class="sign-in" style="margin-left: auto;margin: auto;">
                @include('layouts.sessions_messages')
                    <h2>OTP Verification</h2>
                    <div class="card p-2 text-center">
                        <h6>Enter the verification code that has been sent to your registered email</h6>
                        <div> 
                            <span>A code has been sent to</span> <small>ah0****@****.com</small> 
                        </div>
                    <form style="all:unset;" method="POST"action="{{ route('check_otp') }}">
                            @csrf     
                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                            <input name="otp[]" style="@error('otp') border-bottom: 1px solid #dc3545 !important; @enderror" class="m-2 text-center form-control rounded" type="text" id="first" oninput='digitValidate(this)' onkeyup='tabChange(1, event)' maxlength="1" /> 
                            <input name="otp[]" style="@error('otp') border-bottom: 1px solid #dc3545 !important; @enderror" class="m-2 text-center form-control rounded" type="text" id="second" oninput='digitValidate(this)' onkeyup='tabChange(2, event)' maxlength="1" /> 
                            <input name="otp[]" style="@error('otp') border-bottom: 1px solid #dc3545 !important; @enderror" class="m-2 text-center form-control rounded" type="text" id="third" oninput='digitValidate(this)' onkeyup='tabChange(3, event)' maxlength="1" /> 
                            <input name="otp[]" style="@error('otp') border-bottom: 1px solid #dc3545 !important; @enderror" class="m-2 text-center form-control rounded" type="text" id="fourth" oninput='digitValidate(this)' onkeyup='tabChange(4, event)' maxlength="1" /> 
                            <input name="otp[]" style="@error('otp') border-bottom: 1px solid #dc3545 !important; @enderror" class="m-2 text-center form-control rounded" type="text" id="fifth" oninput='digitValidate(this)' onkeyup='tabChange(5, event)' maxlength="1" /> 
                        </div>
                        @error('otp')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <div class="mt-4"> 
                            <input id="submit" class="submit" type="submit" value="Validate OTP" style="width: 210px;">
                        </div>
                    </form>    
                    </div>
            </div>    
            <div class="image" style="margin-right: auto;">
                <svg xmlns="http://www.w3.org/2000/svg" width="500.769" height="350.263" viewBox="0 0 263.769 218.263">
                    <g id="Group_1213" data-name="Group 1213" transform="translate(-83 -203.885)">
                      <g id="Component_1_1" data-name="Component 1 – 1" transform="translate(83 203.885)">
                        <g id="Group_74" data-name="Group 74" transform="translate(6.825)">
                          <g id="Group_70" data-name="Group 70" transform="translate(0 52.408)">
                            <rect id="Rectangle_16" data-name="Rectangle 16" width="106.476" height="134.83" fill="#f0f0f0"/>
                            <g id="Group_66" data-name="Group 66" transform="translate(3.764 4.914)">
                              <rect id="Rectangle_17" data-name="Rectangle 17" width="98.949" height="28.832" fill="#e0e0e0"/>
                              <rect id="Rectangle_18" data-name="Rectangle 18" width="5.621" height="24.164" transform="translate(0 4.667)" fill="#ebebeb"/>
                              <rect id="Rectangle_19" data-name="Rectangle 19" width="5.621" height="24.164" transform="translate(27.18 4.667)" fill="#ebebeb"/>
                              <rect id="Rectangle_20" data-name="Rectangle 20" width="5.621" height="24.164" transform="translate(58.117 5.019) rotate(-9.778)" fill="#ebebeb"/>
                              <rect id="Rectangle_21" data-name="Rectangle 21" width="5.621" height="20.98" transform="translate(6.965 7.852)" fill="#ebebeb"/>
                              <rect id="Rectangle_22" data-name="Rectangle 22" width="5.621" height="20.98" transform="translate(19.885 7.852)" fill="#ebebeb"/>
                              <rect id="Rectangle_23" data-name="Rectangle 23" width="5.621" height="20.98" transform="translate(52.496 7.852)" fill="#ebebeb"/>
                              <rect id="Rectangle_24" data-name="Rectangle 24" width="5.621" height="20.98" transform="translate(34.696 8.351) rotate(-12.528)" fill="#ebebeb"/>
                              <rect id="Rectangle_25" data-name="Rectangle 25" width="2.811" height="25.364" transform="translate(14.636 3.468)" fill="#ebebeb"/>
                              <rect id="Rectangle_26" data-name="Rectangle 26" width="2.81" height="25.364" transform="translate(48.069 3.468)" fill="#ebebeb"/>
                            </g>
                            <g id="Group_67" data-name="Group 67" transform="translate(3.764 38.311)">
                              <rect id="Rectangle_27" data-name="Rectangle 27" width="98.949" height="28.832" transform="translate(98.949 28.832) rotate(180)" fill="#e0e0e0"/>
                              <rect id="Rectangle_28" data-name="Rectangle 28" width="5.621" height="24.164" transform="translate(98.949 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_29" data-name="Rectangle 29" width="5.621" height="24.164" transform="translate(71.77 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_30" data-name="Rectangle 30" width="5.621" height="24.164" transform="translate(36.729 28.832) rotate(-170.221)" fill="#ebebeb"/>
                              <rect id="Rectangle_31" data-name="Rectangle 31" width="5.621" height="20.98" transform="translate(91.984 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_32" data-name="Rectangle 32" width="5.621" height="20.98" transform="translate(79.065 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_33" data-name="Rectangle 33" width="5.621" height="20.98" transform="translate(46.454 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_34" data-name="Rectangle 34" width="5.621" height="20.98" transform="translate(59.702 28.832) rotate(-167.472)" fill="#ebebeb"/>
                              <rect id="Rectangle_35" data-name="Rectangle 35" width="2.81" height="25.364" transform="translate(84.313 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_36" data-name="Rectangle 36" width="2.81" height="25.364" transform="translate(50.88 28.832) rotate(180)" fill="#ebebeb"/>
                              <rect id="Rectangle_37" data-name="Rectangle 37" width="5.621" height="24.164" transform="translate(0 4.667)" fill="#ebebeb"/>
                              <rect id="Rectangle_38" data-name="Rectangle 38" width="5.621" height="20.98" transform="translate(6.965 7.852)" fill="#ebebeb"/>
                              <rect id="Rectangle_39" data-name="Rectangle 39" width="5.621" height="20.98" transform="translate(19.885 7.852)" fill="#ebebeb"/>
                              <rect id="Rectangle_40" data-name="Rectangle 40" width="2.811" height="25.364" transform="translate(14.636 3.468)" fill="#ebebeb"/>
                            </g>
                            <g id="Group_69" data-name="Group 69" transform="translate(3.406 71.708)">
                              <rect id="Rectangle_41" data-name="Rectangle 41" width="98.949" height="28.832" transform="translate(0.357)" fill="#e0e0e0"/>
                              <g id="Group_68" data-name="Group 68" transform="translate(0 3.468)">
                                <rect id="Rectangle_42" data-name="Rectangle 42" width="5.621" height="24.164" transform="translate(57.151 1.2)" fill="#ebebeb"/>
                                <rect id="Rectangle_43" data-name="Rectangle 43" width="5.621" height="24.164" transform="translate(88.088 1.551) rotate(-9.778)" fill="#ebebeb"/>
                                <rect id="Rectangle_44" data-name="Rectangle 44" width="5.621" height="20.98" transform="translate(36.936 4.384)" fill="#ebebeb"/>
                                <rect id="Rectangle_45" data-name="Rectangle 45" width="5.621" height="20.98" transform="translate(49.856 4.384)" fill="#ebebeb"/>
                                <rect id="Rectangle_46" data-name="Rectangle 46" width="5.621" height="20.98" transform="translate(82.467 4.384)" fill="#ebebeb"/>
                                <rect id="Rectangle_47" data-name="Rectangle 47" width="5.621" height="20.98" transform="translate(64.667 4.884) rotate(-12.528)" fill="#ebebeb"/>
                                <rect id="Rectangle_48" data-name="Rectangle 48" width="2.81" height="25.364" transform="translate(44.607)" fill="#ebebeb"/>
                                <rect id="Rectangle_49" data-name="Rectangle 49" width="2.811" height="25.364" transform="translate(78.041)" fill="#ebebeb"/>
                                <rect id="Rectangle_50" data-name="Rectangle 50" width="5.621" height="24.164" transform="translate(23.42 1.551) rotate(-9.779)" fill="#ebebeb"/>
                                <rect id="Rectangle_51" data-name="Rectangle 51" width="5.621" height="20.98" transform="translate(17.799 4.384)" fill="#ebebeb"/>
                                <rect id="Rectangle_52" data-name="Rectangle 52" width="5.621" height="20.98" transform="translate(0 4.884) rotate(-12.528)" fill="#ebebeb"/>
                                <rect id="Rectangle_53" data-name="Rectangle 53" width="2.81" height="25.364" transform="translate(13.373)" fill="#ebebeb"/>
                              </g>
                            </g>
                          </g>
                          <g id="Group_71" data-name="Group 71" transform="translate(126.135 106.758)">
                            <path id="Path_105" data-name="Path 105" d="M299.744,263.633h60a11.785,11.785,0,0,1,11.785,11.785v46.855H287.959V275.418A11.785,11.785,0,0,1,299.744,263.633Z" transform="translate(-263.215 -263.633)" fill="#e6e6e6"/>
                            <path id="Path_106" data-name="Path 106" d="M258.585,314.689h10.738a7,7,0,0,1,7,7v38.749H251.582V321.692A7,7,0,0,1,258.585,314.689Z" transform="translate(-251.582 -279.96)" fill="#e0e0e0"/>
                            <path id="Path_107" data-name="Path 107" d="M258.585,314.689h.227a7,7,0,0,1,7,7v38.749H251.582V321.692A7,7,0,0,1,258.585,314.689Z" transform="translate(-251.582 -279.96)" fill="#ebebeb"/>
                            <rect id="Rectangle_54" data-name="Rectangle 54" width="82.347" height="17.8" transform="translate(17.229 62.681)" fill="#e6e6e6"/>
                            <rect id="Rectangle_55" data-name="Rectangle 55" width="93.655" height="18.674" rx="9.337" transform="translate(9.993 46.402)" fill="#f5f5f5"/>
                            <rect id="Rectangle_56" data-name="Rectangle 56" width="24.089" height="18.674" rx="9.337" transform="translate(79.429 46.402)" fill="#e0e0e0" style="isolation: isolate"/>
                            <path id="Path_108" data-name="Path 108" d="M391.571,314.689h10.738a7,7,0,0,1,7,7v38.749H384.568V321.692A7,7,0,0,1,391.571,314.689Z" transform="translate(-294.11 -279.96)" fill="#e0e0e0"/>
                            <path id="Path_109" data-name="Path 109" d="M391.571,314.689h.227a7,7,0,0,1,7,7v38.749H384.568V321.692A7,7,0,0,1,391.571,314.689Z" transform="translate(-294.11 -279.96)" fill="#f0f0f0"/>
                          </g>
                          <g id="Group_72" data-name="Group 72" transform="translate(36.262 1.831)">
                            <circle id="Ellipse_16" data-name="Ellipse 16" cx="16.022" cy="16.022" r="16.022" transform="translate(0 5.133) rotate(-9.217)" fill="#e0e0e0"/>
                            <circle id="Ellipse_17" data-name="Ellipse 17" cx="13.622" cy="13.622" r="13.622" transform="translate(2.752 7.117) rotate(-9.217)" fill="#f0f0f0"/>
                            <path id="Path_110" data-name="Path 110" d="M142.567,145.66v-9.523l-6.311,3.571" transform="translate(-124.829 -117.934)" fill="#f0f0f0" stroke="#e0e0e0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                          </g>
                          <g id="Group_73" data-name="Group 73" transform="translate(144.007 0)">
                            <rect id="Rectangle_57" data-name="Rectangle 57" width="102.542" height="90.991" fill="#e6e6e6"/>
                            <rect id="Rectangle_58" data-name="Rectangle 58" width="97.276" height="86.051" transform="translate(2.568 2.494)" fill="#f0f0f0"/>
                            <path id="Path_111" data-name="Path 111" d="M304.462,110.35l-22.829,85.864V155.867l12.053-45.517Z" transform="translate(-279.064 -107.856)" fill="#fff"/>
                            <path id="Path_112" data-name="Path 112" d="M314.526,110.35,291.5,196.4h-3.676l23.03-86.051Z" transform="translate(-281.043 -107.856)" fill="#fff"/>
                            <path id="Path_113" data-name="Path 113" d="M420.722,190.178v13.751l-4.66,18h-3.676Z" transform="translate(-320.879 -133.385)" fill="#fff"/>
                            <rect id="Rectangle_59" data-name="Rectangle 59" width="1.639" height="89.52" transform="translate(34.857 0.947)" fill="#e6e6e6"/>
                            <rect id="Rectangle_60" data-name="Rectangle 60" width="1.639" height="89.52" transform="translate(66.613 0.947)" fill="#e6e6e6"/>
                          </g>
                        </g>
                        <ellipse id="_Path_" data-name="&lt;Path&gt;" cx="131.884" cy="7.702" rx="131.884" ry="7.702" transform="translate(0 202.858)" fill="#f5f5f5"/>
                        <g id="Group_76" data-name="Group 76" transform="translate(223.244 144.142)">
                          <path id="Path_114" data-name="Path 114" d="M399.961,368s3.231-7.05-.46-14-4.762-8.587-2.409-10.011,3.433,5.559,3.433,5.559a15.69,15.69,0,0,0,.346-9.832c-1.638-5.028-2.665-13.217-.429-14.1s.427,10.216,2.369,14a32.554,32.554,0,0,0,1.9-8.248c.268-4.038-.151-10.487,1.615-12.141s2.9-.509,1.162,8.4a93.189,93.189,0,0,0-1.724,16.156s3.834-11.691,6.408-12.031,2.57,3.445.367,6.729-6.45,9.166-7.147,12.193c0,0,4.208-8.8,7.994-6.1s-3.3,8.011-6.451,9.93-5.348,13.956-5.348,13.956Z" transform="translate(-388 -318.593)" fill="#407bff"/>
                          <path id="Path_115" data-name="Path 115" d="M399.961,368s3.231-7.05-.46-14-4.762-8.587-2.409-10.011,3.433,5.559,3.433,5.559a15.69,15.69,0,0,0,.346-9.832c-1.638-5.028-2.665-13.217-.429-14.1s.427,10.216,2.369,14a32.554,32.554,0,0,0,1.9-8.248c.268-4.038-.151-10.487,1.615-12.141s2.9-.509,1.162,8.4a93.189,93.189,0,0,0-1.724,16.156s3.834-11.691,6.408-12.031,2.57,3.445.367,6.729-6.45,9.166-7.147,12.193c0,0,4.208-8.8,7.994-6.1s-3.3,8.011-6.451,9.93-5.348,13.956-5.348,13.956Z" transform="translate(-388 -318.593)" opacity="0.2" style="isolation: isolate"/>
                          <path id="Path_116" data-name="Path 116" d="M398.946,372.2s-3.146-7.1.629-13.991,4.865-8.515,2.529-9.974-3.5,5.508-3.5,5.508a15.7,15.7,0,0,1-.228-9.836c1.7-5,2.824-13.176.6-14.088s-.55,10.209-2.536,13.961a32.638,32.638,0,0,1-1.8-8.276c-.22-4.042.276-10.483-1.47-12.164s-2.892-.552-1.263,8.384a93.282,93.282,0,0,1,1.529,16.181s-3.693-11.746-6.262-12.126-2.611,3.406-.448,6.722,6.34,9.262,7,12.3c0,0-4.1-8.859-7.921-6.22s3.2,8.059,6.331,10.026,5.18,14.035,5.18,14.035Z" transform="translate(-384.435 -319.901)" fill="#407bff"/>
                          <g id="Group_75" data-name="Group 75" transform="translate(0 47.24)">
                            <path id="Path_117" data-name="Path 117" d="M384.313,388.042H410.3l-2.1,18.6H386.416Z" transform="translate(-384.313 -388.042)" fill="#263238"/>
                          </g>
                        </g>
                        <path id="Path_118" data-name="Path 118" d="M208.214,384.621v2.443a.547.547,0,0,1-.552.546H138.675a3.6,3.6,0,0,1-3.338-4.938L157.2,328.529l35.328.241-1.206,7.024-7.793,45.469a2.4,2.4,0,0,0,2.367,2.811h21.767A.547.547,0,0,1,208.214,384.621Z" transform="translate(-81.363 -177.628)" fill="#263238"/>
                        <path id="Path_119" data-name="Path 119" d="M208.214,384.621v2.443a.547.547,0,0,1-.552.546H138.675a3.6,3.6,0,0,1-3.338-4.938l13.555-33.563,8.307-20.58,35.328.241-1.206,7.024-3.389,19.774-4.4,25.695a2.4,2.4,0,0,0,2.367,2.811h21.767A.547.547,0,0,1,208.214,384.621Z" transform="translate(-81.363 -177.628)" fill="#fff" opacity="0.5"/>
                        <path id="Path_120" data-name="Path 120" d="M187.945,387.491H143.06a1.575,1.575,0,0,1-1.454-2.179l19.166-46.1h32.6l-7.793,45.469A2.4,2.4,0,0,0,187.945,387.491Z" transform="translate(-83.413 -181.044)" opacity="0.2" style="isolation: isolate"/>
                        <path id="Path_121" data-name="Path 121" d="M199.024,328.77l-1.206,7.025-3.389,19.774-39.04-6.46,8.307-20.58Z" transform="translate(-87.859 -177.628)" opacity="0.1" style="isolation: isolate"/>
                        <g id="Group_77" data-name="Group 77" transform="translate(12.12 50.21)">
                          <path id="Path_122" data-name="Path 122" d="M241.671,180.5H78.115a4.185,4.185,0,0,0-4.185,4.186V295.41a4.185,4.185,0,0,0,4.185,4.185H241.671a4.186,4.186,0,0,0,4.185-4.185V184.686A4.186,4.186,0,0,0,241.671,180.5Z" transform="translate(-73.93 -180.5)" fill="#263238"/>
                          <path id="Path_123" data-name="Path 123" d="M241.671,180.5H78.115a4.185,4.185,0,0,0-4.185,4.186V295.41a4.185,4.185,0,0,0,4.185,4.185H241.671a4.186,4.186,0,0,0,4.185-4.185V184.686A4.186,4.186,0,0,0,241.671,180.5Z" transform="translate(-73.93 -180.5)" fill="#fff" opacity="0.6"/>
                          <path id="Path_124" data-name="Path 124" d="M81.582,299.593H78.115a4.181,4.181,0,0,1-4.181-4.181V184.688a4.182,4.182,0,0,1,4.181-4.188h3.467a4.183,4.183,0,0,0-4.181,4.188V295.412A4.181,4.181,0,0,0,81.582,299.593Z" transform="translate(-73.931 -180.5)" opacity="0.2" style="isolation: isolate"/>
                        </g>
                        <rect id="Rectangle_61" data-name="Rectangle 61" width="160.914" height="106.771" transform="translate(19.364 53.807)" fill="#407bff"/>
                        <g id="Group_80" data-name="Group 80" transform="translate(83.63 66.511)">
                          <circle id="Ellipse_18" data-name="Ellipse 18" cx="13.971" cy="13.971" r="13.971" transform="translate(0 0)" fill="#fff" opacity="0.4"/>
                          <g id="Group_79" data-name="Group 79" transform="translate(7.273 6.749)">
                            <g id="Group_78" data-name="Group 78" transform="translate(1.875)">
                              <path id="Path_125" data-name="Path 125" d="M194,219.485v-1.307a2.3,2.3,0,0,1,2.3-2.3h2.064a2.3,2.3,0,0,1,2.3,2.3v1.307h1.49v-1.307a3.8,3.8,0,0,0-3.791-3.791H196.3a3.8,3.8,0,0,0-3.791,3.791v1.307Z" transform="translate(-192.509 -214.386)" fill="#fff"/>
                            </g>
                            <path id="Path_126" data-name="Path 126" d="M189.752,224.051v6.867a.759.759,0,0,0,.759.759h11.877a.76.76,0,0,0,.76-.759v-6.867a.76.76,0,0,0-.76-.759H190.511A.759.759,0,0,0,189.752,224.051Zm7.128,3.889v1.35h-.86v-1.35a.835.835,0,0,1-.418-.714.848.848,0,1,1,1.7,0A.835.835,0,0,1,196.88,227.94Z" transform="translate(-189.752 -217.234)" fill="#fff"/>
                          </g>
                        </g>
                        <rect id="Rectangle_62" data-name="Rectangle 62" width="16.04" height="16.04" rx="2.09" transform="translate(48.901 106.023)" fill="#fff"/>
                        <rect id="Rectangle_63" data-name="Rectangle 63" width="16.04" height="16.04" rx="2.09" transform="translate(69.241 106.001)" fill="#fff"/>
                        <rect id="Rectangle_64" data-name="Rectangle 64" width="16.04" height="16.04" rx="2.09" transform="translate(89.581 105.979)" fill="#fff"/>
                        <rect id="Rectangle_65" data-name="Rectangle 65" width="16.04" height="16.04" rx="2.09" transform="translate(109.921 105.956)" fill="#fff"/>
                        <rect id="Rectangle_66" data-name="Rectangle 66" width="16.04" height="16.04" rx="2.09" transform="translate(130.261 105.933)" fill="#fff"/>
                        <g id="Group_81" data-name="Group 81" transform="translate(80.024 99.044)" opacity="0.6">
                          <path id="Path_127" data-name="Path 127" d="M176.117,255.365v.3h-2.358v-3.334h2.287v.3h-1.934v1.186h1.724v.3h-1.724v1.239Z" transform="translate(-173.759 -252.306)" fill="#fff"/>
                          <path id="Path_128" data-name="Path 128" d="M180.643,254.6v1.452H180.3v-1.42a.7.7,0,0,0-.753-.8.822.822,0,0,0-.877.905v1.314h-.338v-2.505h.324v.461a1.053,1.053,0,0,1,.952-.481A.96.96,0,0,1,180.643,254.6Z" transform="translate(-175.223 -252.687)" fill="#fff"/>
                          <path id="Path_129" data-name="Path 129" d="M184.212,255.65a.8.8,0,0,1-.529.175.664.664,0,0,1-.734-.729v-1.515H182.5V253.3h.448v-.548h.339v.548h.762v.286h-.762v1.5a.4.4,0,0,0,.433.457.559.559,0,0,0,.371-.129Z" transform="translate(-176.555 -252.438)" fill="#fff"/>
                          <path id="Path_130" data-name="Path 130" d="M187.848,254.9h-2.1a.928.928,0,0,0,.986.871.989.989,0,0,0,.767-.329l.19.219a1.325,1.325,0,0,1-2.282-.867,1.207,1.207,0,0,1,1.224-1.273,1.194,1.194,0,0,1,1.215,1.273C187.853,254.826,187.848,254.864,187.848,254.9Zm-2.1-.253h1.777a.89.89,0,0,0-1.777,0Z" transform="translate(-177.486 -252.687)" fill="#fff"/>
                          <path id="Path_131" data-name="Path 131" d="M191.275,253.525v.329c-.029,0-.057,0-.081,0a.81.81,0,0,0-.843.924v1.277h-.338v-2.505h.324v.49A.946.946,0,0,1,191.275,253.525Z" transform="translate(-178.957 -252.687)" fill="#fff"/>
                          <path id="Path_132" data-name="Path 132" d="M196.481,253.554l-1.252,2.806c-.21.49-.477.648-.834.648a.859.859,0,0,1-.61-.229l.158-.252a.628.628,0,0,0,.457.19c.224,0,.376-.1.519-.419l.11-.243-1.12-2.5h.353l.943,2.129.943-2.129Z" transform="translate(-180.163 -252.696)" fill="#fff"/>
                          <path id="Path_133" data-name="Path 133" d="M197.972,254.8a1.274,1.274,0,1,1,1.277,1.276A1.233,1.233,0,0,1,197.972,254.8Zm2.205,0a.932.932,0,1,0-.928.976A.914.914,0,0,0,200.177,254.8Z" transform="translate(-181.502 -252.687)" fill="#fff"/>
                          <path id="Path_134" data-name="Path 134" d="M204.979,253.554v2.505h-.324V255.6a1,1,0,0,1-.9.481.971.971,0,0,1-1.058-1.076v-1.453h.338v1.42a.7.7,0,0,0,.753.8.815.815,0,0,0,.853-.91v-1.314Z" transform="translate(-183.013 -252.696)" fill="#fff"/>
                          <path id="Path_135" data-name="Path 135" d="M208.705,253.525v.329c-.029,0-.057,0-.081,0a.81.81,0,0,0-.843.924v1.277h-.338v-2.505h.324v.49A.945.945,0,0,1,208.705,253.525Z" transform="translate(-184.531 -252.687)" fill="#fff"/>
                          <path id="Path_136" data-name="Path 136" d="M211.754,253.989a1.752,1.752,0,1,1,1.754,1.7A1.678,1.678,0,0,1,211.754,253.989Zm3.149,0a1.4,1.4,0,1,0-1.4,1.381A1.351,1.351,0,0,0,214.9,253.989Z" transform="translate(-185.91 -252.293)" fill="#fff"/>
                          <path id="Path_137" data-name="Path 137" d="M218.393,252.64h-1.172v-.3h2.7v.3h-1.172v3.03h-.352Z" transform="translate(-187.658 -252.306)" fill="#fff"/>
                          <path id="Path_138" data-name="Path 138" d="M224.62,253.478c0,.71-.515,1.139-1.363,1.139h-.9v1.052h-.353v-3.334h1.248C224.105,252.335,224.62,252.764,224.62,253.478Zm-.353,0c0-.534-.352-.839-1.019-.839h-.886v1.667h.886C223.915,254.307,224.267,254,224.267,253.478Z" transform="translate(-189.189 -252.306)" fill="#fff"/>
                        </g>
                        <g id="Group_82" data-name="Group 82" transform="translate(84.369 127.613)" opacity="0.6">
                          <path id="Path_139" data-name="Path 139" d="M180.146,297.5l.138-.271a1.639,1.639,0,0,0,1.1.4c.624,0,.9-.262.9-.59,0-.915-2.054-.353-2.054-1.586,0-.491.381-.915,1.229-.915a1.888,1.888,0,0,1,1.034.295l-.119.282a1.719,1.719,0,0,0-.915-.277c-.609,0-.882.272-.882.605,0,.915,2.054.362,2.054,1.577,0,.491-.39.91-1.243.91A1.808,1.808,0,0,1,180.146,297.5Z" transform="translate(-180.146 -294.374)" fill="#fff"/>
                          <path id="Path_140" data-name="Path 140" d="M186.878,297.155h-2.1a.929.929,0,0,0,.986.871.989.989,0,0,0,.767-.329l.19.219a1.325,1.325,0,0,1-2.282-.867,1.207,1.207,0,0,1,1.224-1.272,1.194,1.194,0,0,1,1.215,1.272C186.883,297.079,186.878,297.117,186.878,297.155Zm-2.1-.253h1.777a.89.89,0,0,0-1.777,0Z" transform="translate(-181.52 -294.768)" fill="#fff"/>
                          <path id="Path_141" data-name="Path 141" d="M191.349,296.85V298.3h-.339v-1.42a.7.7,0,0,0-.752-.8.822.822,0,0,0-.877.905V298.3h-.338V295.8h.324v.461a1.054,1.054,0,0,1,.953-.481A.96.96,0,0,1,191.349,296.85Z" transform="translate(-182.991 -294.768)" fill="#fff"/>
                          <path id="Path_142" data-name="Path 142" d="M195.964,294.293v3.535h-.324v-.5a1.087,1.087,0,0,1-.967.519,1.275,1.275,0,0,1,0-2.549,1.1,1.1,0,0,1,.953.5v-1.506Zm-.334,2.282a.932.932,0,1,0-.928.977A.916.916,0,0,0,195.63,296.575Z" transform="translate(-184.393 -294.293)" fill="#fff"/>
                          <path id="Path_143" data-name="Path 143" d="M202.168,296.75V298.3h-.324v-.39a.94.94,0,0,1-.862.414c-.567,0-.915-.3-.915-.728,0-.386.248-.71.967-.71h.8v-.153c0-.428-.243-.661-.709-.661a1.278,1.278,0,0,0-.834.3l-.152-.253a1.592,1.592,0,0,1,1.02-.338A.89.89,0,0,1,202.168,296.75Zm-.338.8v-.41h-.786c-.486,0-.643.19-.643.448,0,.29.233.471.634.471A.8.8,0,0,0,201.83,297.551Z" transform="translate(-186.517 -294.768)" fill="#fff"/>
                          <path id="Path_144" data-name="Path 144" d="M206.722,295.8V298a1.1,1.1,0,0,1-1.253,1.253,1.744,1.744,0,0,1-1.167-.386l.171-.256a1.492,1.492,0,0,0,.986.342c.633,0,.924-.29.924-.909v-.319a1.129,1.129,0,0,1-.977.486,1.216,1.216,0,1,1,0-2.43,1.131,1.131,0,0,1,.991.5V295.8Zm-.329,1.191a.951.951,0,1,0-.953.919A.9.9,0,0,0,206.393,296.989Z" transform="translate(-187.822 -294.768)" fill="#fff"/>
                          <path id="Path_145" data-name="Path 145" d="M211.114,296.75V298.3h-.324v-.39a.941.941,0,0,1-.863.414c-.567,0-.914-.3-.914-.728,0-.386.248-.71.967-.71h.8v-.153c0-.428-.243-.661-.71-.661a1.276,1.276,0,0,0-.833.3l-.152-.253a1.59,1.59,0,0,1,1.019-.338A.89.89,0,0,1,211.114,296.75Zm-.338.8v-.41h-.786c-.486,0-.643.19-.643.448,0,.29.233.471.633.471A.8.8,0,0,0,210.776,297.551Z" transform="translate(-189.378 -294.768)" fill="#fff"/>
                          <path id="Path_146" data-name="Path 146" d="M213.34,294.532a.244.244,0,0,1,.248-.239.24.24,0,0,1,.248.234.248.248,0,0,1-.5,0Zm.076.791h.338v2.505h-.338Z" transform="translate(-190.761 -294.293)" fill="#fff"/>
                          <path id="Path_147" data-name="Path 147" d="M217.641,296.85V298.3H217.3v-1.42a.7.7,0,0,0-.752-.8.822.822,0,0,0-.877.905V298.3h-.338V295.8h.324v.461a1.054,1.054,0,0,1,.953-.481A.96.96,0,0,1,217.641,296.85Z" transform="translate(-191.399 -294.768)" fill="#fff"/>
                        </g>
                        <path id="Path_148" data-name="Path 148" d="M206.985,319.177H169.077a5.651,5.651,0,0,1-5.651-5.651h0a5.65,5.65,0,0,1,5.651-5.65h37.908a5.651,5.651,0,0,1,5.651,5.65h0A5.651,5.651,0,0,1,206.985,319.177Z" transform="translate(-90.43 -171.023)" fill="#fff" opacity="0.4"/>
                        <g id="Group_83" data-name="Group 83" transform="translate(82.816 140.266)">
                          <path id="Path_149" data-name="Path 149" d="M177.863,314.842a1.926,1.926,0,0,1,2.017-1.947,1.878,1.878,0,0,1,1.447.593l-.354.342a1.412,1.412,0,0,0-1.071-.452,1.463,1.463,0,1,0,0,2.926,1.415,1.415,0,0,0,1.071-.457l.354.343a1.891,1.891,0,0,1-1.452.6A1.924,1.924,0,0,1,177.863,314.842Z" transform="translate(-177.863 -312.895)" fill="#fff"/>
                          <path id="Path_150" data-name="Path 150" d="M183.527,314.842a2.025,2.025,0,1,1,2.028,1.947A1.935,1.935,0,0,1,183.527,314.842Zm3.5,0a1.479,1.479,0,1,0-1.474,1.463A1.43,1.43,0,0,0,187.029,314.842Z" transform="translate(-179.674 -312.895)" fill="#fff"/>
                          <path id="Path_151" data-name="Path 151" d="M193.977,312.959v3.807h-.446l-2.284-2.839v2.839H190.7v-3.807h.446l2.284,2.839v-2.839Z" transform="translate(-181.969 -312.915)" fill="#fff"/>
                          <path id="Path_152" data-name="Path 152" d="M197.7,313.432h-1.305v-.473h3.149v.473h-1.305v3.334H197.7Z" transform="translate(-183.788 -312.915)" fill="#fff"/>
                          <path id="Path_153" data-name="Path 153" d="M201.894,312.959h.544v3.807h-.544Z" transform="translate(-185.548 -312.915)" fill="#fff"/>
                          <path id="Path_154" data-name="Path 154" d="M207.648,312.959v3.807H207.2l-2.284-2.839v2.839h-.544v-3.807h.446L207.1,315.8v-2.839Z" transform="translate(-186.341 -312.915)" fill="#fff"/>
                          <path id="Path_155" data-name="Path 155" d="M210.822,315.123v-2.164h.544V315.1c0,.843.386,1.224,1.071,1.224s1.077-.38,1.077-1.224v-2.143h.528v2.164a1.612,1.612,0,1,1-3.22,0Z" transform="translate(-188.403 -312.915)" fill="#fff"/>
                          <path id="Path_156" data-name="Path 156" d="M219.961,316.293v.473H217.2v-3.807h2.687v.473h-2.143V314.6h1.909v.463h-1.909v1.229Z" transform="translate(-190.442 -312.915)" fill="#fff"/>
                        </g>
                        <path id="Path_157" data-name="Path 157" d="M228.89,186.287c-22.249,22.291-79.394,71.9-144.144,68.231V186.287Z" transform="translate(-65.269 -132.14)" fill="#fff" opacity="0.1"/>
                        <path id="Path_158" data-name="Path 158" d="M275.666,246.025v65.8H178.787c3.716-13.291,11.142-31.491,25.549-44.5C230.253,243.931,260.329,244,275.666,246.025Z" transform="translate(-95.342 -150.98)" fill="#fff" opacity="0.1"/>
                        <text id="_" data-name="*" transform="translate(52.187 126.112)" font-size="22" font-family="MyriadPro-Regular, Myriad Pro"><tspan x="0" y="0">*</tspan></text>
                        <text id="_2" data-name="*" transform="translate(72.996 126.112)" font-size="22" font-family="MyriadPro-Regular, Myriad Pro"><tspan x="0" y="0">*</tspan></text>
                        <text id="_3" data-name="*" transform="translate(92.866 126.112)" font-size="22" font-family="MyriadPro-Regular, Myriad Pro"><tspan x="0" y="0">*</tspan></text>
                        <text id="_4" data-name="*" transform="translate(113.207 126.112)" font-size="22" font-family="MyriadPro-Regular, Myriad Pro"><tspan x="0" y="0">*</tspan></text>
                        <text id="_5" data-name="*" transform="translate(133.781 126.112)" font-size="22" font-family="MyriadPro-Regular, Myriad Pro"><tspan x="0" y="0">*</tspan></text>
                        <path id="Path_159" data-name="Path 159" d="M351.232,171.09l2.257,9.973,2.257-9.973Z" transform="translate(-150.489 -127.28)" fill="#407bff"/>
                        <path id="Path_160" data-name="Path 160" d="M351.232,171.09l2.257,9.973,2.257-9.973Z" transform="translate(-150.489 -127.28)" fill="#fff" opacity="0.7"/>
                        <rect id="Rectangle_67" data-name="Rectangle 67" width="62.229" height="30.444" rx="8.592" transform="translate(171.885 15.575)" fill="#407bff"/>
                        <rect id="Rectangle_68" data-name="Rectangle 68" width="62.229" height="30.444" rx="8.592" transform="translate(171.885 15.575)" fill="#fff" opacity="0.7"/>
                        <g id="Group_84" data-name="Group 84" transform="translate(182.267 24.029)" opacity="0.5">
                          <path id="Path_161" data-name="Path 161" d="M326.12,144.836v1.316h-.539v-1.326l-1.511-2.481h.582l1.218,2.007,1.224-2.007h.539Z" transform="translate(-324.07 -142.117)" fill="#263238"/>
                          <path id="Path_162" data-name="Path 162" d="M329.133,145.134a1.5,1.5,0,1,1,1.5,1.473A1.434,1.434,0,0,1,329.133,145.134Zm2.469,0a.972.972,0,1,0-.968,1.017A.946.946,0,0,0,331.6,145.134Z" transform="translate(-325.689 -142.539)" fill="#263238"/>
                          <path id="Path_163" data-name="Path 163" d="M337.279,143.705v2.882h-.5v-.435a1.171,1.171,0,0,1-.979.467,1.132,1.132,0,0,1-1.24-1.256v-1.659h.522v1.6c0,.566.282.849.777.849a.849.849,0,0,0,.892-.958v-1.49Z" transform="translate(-327.426 -142.552)" fill="#263238"/>
                          <path id="Path_164" data-name="Path 164" d="M341.571,143.665v.505a.922.922,0,0,0-.12-.005.86.86,0,0,0-.908.974v1.435h-.522v-2.882h.5v.484A1.1,1.1,0,0,1,341.571,143.665Z" transform="translate(-329.171 -142.539)" fill="#263238"/>
                          <path id="Path_165" data-name="Path 165" d="M345.109,144.229a2.025,2.025,0,1,1,2.028,1.947A1.935,1.935,0,0,1,345.109,144.229Zm3.5,0a1.479,1.479,0,1,0-1.474,1.463A1.429,1.429,0,0,0,348.611,144.229Z" transform="translate(-330.798 -142.097)" fill="#263238"/>
                          <path id="Path_166" data-name="Path 166" d="M352.7,142.818H351.4v-.473h3.149v.473h-1.305v3.334H352.7Z" transform="translate(-332.809 -142.117)" fill="#263238"/>
                          <path id="Path_167" data-name="Path 167" d="M359.973,143.672c0,.827-.6,1.328-1.588,1.328h-.941v1.152H356.9v-3.807h1.486C359.375,142.345,359.973,142.846,359.973,143.672Zm-.543,0c0-.544-.365-.854-1.06-.854h-.925v1.708h.925C359.065,144.526,359.43,144.216,359.43,143.672Z" transform="translate(-334.569 -142.117)" fill="#263238"/>
                          <path id="Path_168" data-name="Path 168" d="M364.373,144.229a1.925,1.925,0,0,1,2.017-1.947,1.88,1.88,0,0,1,1.447.592l-.354.343a1.41,1.41,0,0,0-1.071-.452,1.463,1.463,0,1,0,0,2.926,1.415,1.415,0,0,0,1.071-.457l.354.343a1.888,1.888,0,0,1-1.452.6A1.924,1.924,0,0,1,364.373,144.229Z" transform="translate(-336.959 -142.097)" fill="#263238"/>
                          <path id="Path_169" data-name="Path 169" d="M369.933,145.134a1.5,1.5,0,1,1,1.5,1.473A1.434,1.434,0,0,1,369.933,145.134Zm2.469,0a.972.972,0,1,0-.968,1.017A.946.946,0,0,0,372.4,145.134Z" transform="translate(-338.737 -142.539)" fill="#263238"/>
                          <path id="Path_170" data-name="Path 170" d="M378,142.01v4.035h-.5v-.456a1.217,1.217,0,0,1-1.028.489,1.471,1.471,0,0,1,0-2.942,1.228,1.228,0,0,1,1.006.462V142.01Zm-.517,2.594a.972.972,0,1,0-.968,1.017A.949.949,0,0,0,377.482,144.6Z" transform="translate(-340.361 -142.01)" fill="#263238"/>
                          <path id="Path_171" data-name="Path 171" d="M383.329,145.308h-2.339a.977.977,0,0,0,1.044.843,1.077,1.077,0,0,0,.833-.348l.288.337a1.571,1.571,0,0,1-2.686-1.006,1.411,1.411,0,0,1,1.446-1.469,1.39,1.39,0,0,1,1.425,1.485C383.34,145.193,383.335,145.258,383.329,145.308Zm-2.339-.375h1.85a.931.931,0,0,0-1.85,0Z" transform="translate(-342.106 -142.539)" fill="#263238"/>
                        </g>
                        <text id="_6" data-name="*****" transform="translate(190.075 40.108)" fill="#6c7487" font-size="11" font-family="MyriadPro-Regular, Myriad Pro"><tspan x="0" y="0">*****</tspan></text>
                        <path id="Path_172" data-name="Path 172" d="M343.681,214.019a38.212,38.212,0,0,0,14.835,6.3c4.266.694-3.627-14-3.627-14" transform="translate(-148.075 -138.547)" fill="none" stroke="#dc897c" stroke-miterlimit="10" stroke-width="8.842"/>
                        <g id="Group_85" data-name="Group 85" transform="translate(193.273 72.218)">
                          <path id="Path_173" data-name="Path 173" d="M343.625,212.921a13.459,13.459,0,0,1,6.548,2.658L347.436,224S334.234,211.846,343.625,212.921Z" transform="translate(-340.251 -212.854)" fill="#407bff"/>
                          <path id="Path_174" data-name="Path 174" d="M343.6,220.033A55.125,55.125,0,0,0,347.431,224l1.126-3.46,1.615-4.956a13.4,13.4,0,0,0-6.544-2.66C337.851,212.263,340.613,216.6,343.6,220.033Z" transform="translate(-340.251 -212.855)" fill="#fff" opacity="0.6"/>
                          <path id="Path_175" data-name="Path 175" d="M345.164,222.843A55.108,55.108,0,0,0,349,226.809l1.126-3.46a8.054,8.054,0,0,0-4.938-1.7A6.492,6.492,0,0,0,345.164,222.843Z" transform="translate(-341.816 -215.665)" opacity="0.2" style="isolation: isolate"/>
                        </g>
                        <path id="Path_176" data-name="Path 176" d="M301.306,194.69s-6.326,21.035,7,23.857,14.722-6.856,14.722-6.856S312.112,195.119,301.306,194.69Z" transform="translate(-134.044 -134.827)" fill="#263238"/>
                        <g id="Group_87" data-name="Group 87" transform="translate(162.071 54.082)">
                          <path id="Path_177" data-name="Path 177" d="M297.41,204.089a2.528,2.528,0,0,1,1.824-1.284" transform="translate(-295.348 -191.504)" fill="none" stroke="#263238" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.482"/>
                          <path id="Path_178" data-name="Path 178" d="M299.953,208.772a10.269,10.269,0,0,1-.549,2.4,1.335,1.335,0,0,0,1.393.026Z" transform="translate(-295.986 -193.412)" fill="#de5753"/>
                          <g id="Group_86" data-name="Group 86" transform="translate(2.056 13.565)">
                            <path id="Path_179" data-name="Path 179" d="M298.293,207.015c.141.373.458.6.707.5s.335-.474.193-.847-.458-.6-.707-.5S298.151,206.641,298.293,207.015Z" transform="translate(-297.664 -206.137)" fill="#263238"/>
                            <path id="Path_180" data-name="Path 180" d="M298.333,206.143l-.932-.01S298.065,206.662,298.333,206.143Z" transform="translate(-297.401 -206.133)" fill="#263238"/>
                          </g>
                          <path id="Path_181" data-name="Path 181" d="M311.565,205.787a.687.687,0,0,1-.1.17c-.061.116-.129.224-.2.34a6.488,6.488,0,0,1-1.564,1.871c-2.061,1.626-3.816,2.115-5.36,1.646-.075-.02-.15-.048-.224-.075l-.007.007c-2.292-.932-4.054-3.673-5.5-7.3a14.407,14.407,0,0,1-1.177-4.476c0-.014-.02-.054-.02-.068,0-.054-.014-.122-.014-.177a5.332,5.332,0,0,1,2.149-4.6,10.324,10.324,0,0,1,1.973-1.218C308.362,188.585,314.973,199.373,311.565,205.787Z" transform="translate(-295.345 -187.82)" fill="#e4897b"/>
                          <path id="Path_182" data-name="Path 182" d="M314.54,213.356a6.488,6.488,0,0,1-1.565,1.871c-2.061,1.626-3.816,2.115-5.36,1.646a7.453,7.453,0,0,0,3.87-2.347A3.863,3.863,0,0,1,314.54,213.356Z" transform="translate(-298.612 -194.878)" opacity="0.2" style="isolation: isolate"/>
                          <path id="Path_183" data-name="Path 183" d="M297.367,196.6a7.988,7.988,0,0,0,7.441,4.906s4.326,4.076,7.245,2.783c3.979-1.764,4.8-9,.741-14.057C307.532,183.678,296.047,188.372,297.367,196.6Z" transform="translate(-295.301 -186.495)" fill="#263238"/>
                          <path id="Path_184" data-name="Path 184" d="M303.9,206.558c-.354-.752-.346-2.3.9-2.681,1.292-.395,3.371,2.268.716,4.339C305.139,208.514,304.64,208.127,303.9,206.558Z" transform="translate(-297.36 -191.835)" fill="#e4897b"/>
                          <path id="Path_185" data-name="Path 185" d="M302.412,187.213s-5.144,1.01-6.811,4.059c-1.946,3.56-2.015,6.324,3.135,8.128,0,0,6.533-6.149,9.347-6.832a30.7,30.7,0,0,1,5-.8C311.217,186.415,304.486,184.958,302.412,187.213Z" transform="translate(-294.379 -186.191)" fill="#263238"/>
                          <path id="Path_186" data-name="Path 186" d="M313.507,213.83a12.088,12.088,0,0,1,4.459,6.488l11.027-6.432s-8.633-1.971-10.119-5.31C318.874,208.577,313.109,209.294,313.507,213.83Z" transform="translate(-300.49 -193.35)" fill="#e4897b"/>
                        </g>
                        <path id="Path_187" data-name="Path 187" d="M322.183,242s-14.256-14.038-15.822-18.444a23.355,23.355,0,0,1,18.01-9.746c12.008-.392,20.173,22.448,20.173,22.448Z" transform="translate(-136.14 -140.939)" fill="#407bff"/>
                        <path id="Path_188" data-name="Path 188" d="M344.545,236.257,322.187,242s-3.115-3.068-6.6-6.782c-1.075-1.163-2.2-2.388-3.279-3.6-2.836-3.218-5.34-6.36-5.945-8.067A23.351,23.351,0,0,1,324.37,213.8C336.382,213.416,344.545,236.257,344.545,236.257Z" transform="translate(-136.141 -140.938)" fill="#fff" opacity="0.6"/>
                        <path id="Path_189" data-name="Path 189" d="M309.488,198.8a14.988,14.988,0,0,0,9.419,9.241c7.333,2.3,5.493,9.784,12.6,8.9,3.783-.469,7.02-8.171-4.58-14.956-6.761-3.955-4.138-16.942-18.487-15.724C308.441,186.267,311.417,195.169,309.488,198.8Z" transform="translate(-136.805 -132.108)" fill="#263238"/>
                        <path id="Path_190" data-name="Path 190" d="M318.876,374.682l-3.4-.773c.511-16.99,2.965-37.571,5.138-53.017.342-2.422.672-4.71.993-6.844.155-1.014.3-1.988.444-2.926.7-4.632,1.3-8.292,1.678-10.556.275-1.651.432-2.557.432-2.557L336.388,301l-.876,3.085-2.892,10.187-.328,1.166-1.916,6.725-3.251,11.453C327.342,350.911,318.876,374.682,318.876,374.682Z" transform="translate(-139.056 -167.868)" fill="#e4897b"/>
                        <path id="Path_191" data-name="Path 191" d="M359.473,370.611l-3.484-.175c-2.652-18.285-3.77-41.148-4.25-57.049-.071-2.464-.131-4.767-.179-6.852,0-.108,0-.207,0-.309-.088-4.141-.131-7.435-.151-9.52-.007-1.633-.013-2.528-.013-2.528l12.561.825-.539,5.234-.789,7.692-.156,1.507-.541,5.241-1.45,14.055C363.69,345.728,359.473,370.611,359.473,370.611Z" transform="translate(-150.54 -166.643)" fill="#e4897b"/>
                        <g id="Group_89" data-name="Group 89" transform="translate(196.696 202.042)">
                          <path id="Path_192" data-name="Path 192" d="M358.822,405.448c-.01-.436-5.371-.095-5.371-.095s-3.3,3.354-6.5,4.108-1.413,2.676,2.167,2.676h8.856C360.518,412.138,358.929,409.97,358.822,405.448Z" transform="translate(-345.283 -404.197)" fill="#263238"/>
                          <g id="Group_88" data-name="Group 88" transform="translate(4.717)">
                            <path id="Path_193" data-name="Path 193" d="M352.377,406.113a.515.515,0,0,1-.13-.571.573.573,0,0,1,.286-.362,2.191,2.191,0,0,1,1.2-.131c-.436-.233-.818-.516-.834-.8-.011-.184.107-.335.352-.45a.828.828,0,0,1,.694-.02c.727.3,1.177,1.554,1.2,1.607a.145.145,0,0,1-.005.108.206.206,0,0,1-.02.03h0a.134.134,0,0,1-.048.037,6.729,6.729,0,0,1-2.222.679A.738.738,0,0,1,352.377,406.113Zm.3-.689a.3.3,0,0,0-.153.188c-.054.21.013.265.035.284.252.207,1.235-.088,2.024-.422A3.51,3.51,0,0,0,352.674,405.424Zm.7-1.368c-.073.034-.2.1-.19.178.014.241.78.658,1.575.96a2.36,2.36,0,0,0-.92-1.152.562.562,0,0,0-.218-.046A.573.573,0,0,0,353.374,404.056Z" transform="translate(-352.218 -403.714)" fill="#263238"/>
                          </g>
                        </g>
                        <g id="Group_91" data-name="Group 91" transform="translate(168.008 202.042)">
                          <path id="Path_194" data-name="Path 194" d="M316.646,405.448c-.01-.436-5.37-.095-5.37-.095s-3.3,3.354-6.5,4.108-1.413,2.676,2.166,2.676H315.8C318.342,412.138,316.752,409.97,316.646,405.448Z" transform="translate(-303.107 -404.197)" fill="#263238"/>
                          <g id="Group_90" data-name="Group 90" transform="translate(4.717)">
                            <path id="Path_195" data-name="Path 195" d="M310.2,406.113a.514.514,0,0,1-.13-.571.573.573,0,0,1,.286-.362,2.187,2.187,0,0,1,1.2-.131c-.435-.233-.818-.516-.834-.8-.011-.184.108-.335.352-.45a.828.828,0,0,1,.694-.02c.726.3,1.177,1.554,1.2,1.607a.142.142,0,0,1-.005.108.2.2,0,0,1-.019.03h0a.134.134,0,0,1-.048.037,6.735,6.735,0,0,1-2.222.679A.737.737,0,0,1,310.2,406.113Zm.3-.689a.3.3,0,0,0-.154.188c-.053.21.014.265.035.284.253.207,1.235-.088,2.025-.422A3.51,3.51,0,0,0,310.5,405.424Zm.7-1.368c-.073.034-.2.1-.191.178.014.241.781.658,1.575.96a2.357,2.357,0,0,0-.92-1.152.559.559,0,0,0-.217-.046A.57.57,0,0,0,311.2,404.056Z" transform="translate(-310.042 -403.714)" fill="#263238"/>
                          </g>
                        </g>
                        <path id="Path_196" data-name="Path 196" d="M325.356,286.749l2.9-20.387V252.554c7.639-5.742,22.362-5.742,22.362-5.742s11.317,15.689,5.818,41.517l-14.2,2.075-.908-4.817-1.781,4.817Z" transform="translate(-142.214 -151.496)" fill="#263238"/>
                        <path id="Path_197" data-name="Path 197" d="M325.356,286.749l2.9-20.387V252.554c7.639-5.742,22.362-5.742,22.362-5.742s11.317,15.689,5.818,41.517l-14.2,2.075-.908-4.817-1.781,4.817Z" transform="translate(-142.214 -151.496)" fill="#fff" opacity="0.2"/>
                        <path id="Path_198" data-name="Path 198" d="M348.837,296.733l2.735-8.5s2.871-.87,6.556-6.571C358.128,281.666,357.489,291.37,348.837,296.733Z" transform="translate(-149.724 -162.642)" opacity="0.2" style="isolation: isolate"/>
                        <path id="Path_199" data-name="Path 199" d="M339.939,260.724l6.375-.609a14.386,14.386,0,0,1,1.021,7.57l-4.089,2.454-2.959-2.1S340.2,262.639,339.939,260.724Z" transform="translate(-146.878 -155.75)" opacity="0.2" style="isolation: isolate"/>
                        <path id="Path_200" data-name="Path 200" d="M362.5,258.4a32.059,32.059,0,0,1,1.884,6.526l2.262.957,1.218-1.514s-.828-4.445-2.22-6.62Z" transform="translate(-154.091 -154.994)" opacity="0.2" style="isolation: isolate"/>
                        <path id="Path_201" data-name="Path 201" d="M324.881,303.817l15.074,4.425-.946,2.023-14.324-4.4Z" transform="translate(-142 -169.726)" fill="#263238"/>
                        <path id="Path_202" data-name="Path 202" d="M349.311,308.786l.249,1.86,14.781-1.86.228-2.349Z" transform="translate(-149.875 -170.563)" fill="#263238"/>
                        <g id="Group_92" data-name="Group 92" transform="translate(185.905 95.909)">
                          <path id="Path_203" data-name="Path 203" d="M353.53,249.916a53.412,53.412,0,0,1,7.311-.711l-.909-1.505a41.505,41.505,0,0,0-7.129.426Z" transform="translate(-336.896 -247.683)" fill="#263238"/>
                          <path id="Path_204" data-name="Path 204" d="M332.492,253.718c-1.948.843-3.074,1.48-3.074,1.48l.013,1.857c1.1-.556,2.2-1.06,3.3-1.518Z" transform="translate(-329.418 -249.613)" fill="#263238"/>
                          <path id="Path_205" data-name="Path 205" d="M335.186,253.6a59.582,59.582,0,0,1,11.7-3.258l-.679-1.811a51.556,51.556,0,0,0-11.306,3.251Z" transform="translate(-331.173 -247.953)" fill="#263238"/>
                        </g>
                        <g id="Group_93" data-name="Group 93" transform="translate(142.035 105.326)">
                          <path id="Path_206" data-name="Path 206" d="M273.117,263.079l-3.863-1.551-.652,3.645s3.484,2.114,4.934-.4Z" transform="translate(-266.099 -261.528)" fill="#e4897b"/>
                          <path id="Path_207" data-name="Path 207" d="M266.161,261.752l-1.238,2.821,2.5.6.652-3.645Z" transform="translate(-264.923 -261.528)" fill="#e4897b"/>
                        </g>
                        <g id="Group_94" data-name="Group 94" transform="translate(203.712 61.97)">
                          <path id="Path_208" data-name="Path 208" d="M360.537,204.253l-.459-4.137-3.52,1.148s-.216,4.07,2.685,4.158Z" transform="translate(-355.904 -198.533)" fill="#e4897b"/>
                          <path id="Path_209" data-name="Path 209" d="M358.669,197.788l-3.071.243.654,2.489,3.521-1.148Z" transform="translate(-355.598 -197.788)" fill="#e4897b"/>
                        </g>
                        <path id="Path_210" data-name="Path 210" d="M318.064,241.359c-1.075-1.163-2.2-2.388-3.279-3.6-.415-2.53-.68-4.755-.68-4.755A9.825,9.825,0,0,1,318.064,241.359Z" transform="translate(-138.616 -147.081)" opacity="0.2" style="isolation: isolate"/>
                        <path id="Path_211" data-name="Path 211" d="M298.754,230.209a93.387,93.387,0,0,1-6.633,17.768c-2.447,4.712-18.132,6.167-18.132,6.167" transform="translate(-125.788 -146.187)" fill="none" stroke="#dc897c" stroke-miterlimit="10" stroke-width="8.842"/>
                        <path id="Path_212" data-name="Path 212" d="M307.127,223.7c-3.33,2.174-5.111,7.836-5.675,10.606l6.912,5.086,3.487-3.4C313.266,228.186,308.386,222.881,307.127,223.7Z" transform="translate(-134.57 -144.079)" fill="#407bff"/>
                        <path id="Path_213" data-name="Path 213" d="M307.127,223.7c-3.33,2.174-5.111,7.836-5.675,10.606l6.912,5.086,3.487-3.4C313.266,228.186,308.386,222.881,307.127,223.7Z" transform="translate(-134.57 -144.079)" fill="#fff" opacity="0.6"/>
                        <g id="Group_95" data-name="Group 95" transform="translate(200.106 57.398)">
                          <path id="Path_214" data-name="Path 214" d="M356.682,202.69l-4.932.525a.5.5,0,0,1-.519-.528l-.3-10.457a.6.6,0,0,1,.486-.635l4.932-.525a.5.5,0,0,1,.519.528l.3,10.457A.6.6,0,0,1,356.682,202.69Z" transform="translate(-350.499 -191.067)" fill="#263238"/>
                          <path id="Path_215" data-name="Path 215" d="M356.682,202.69l-4.932.525a.5.5,0,0,1-.519-.528l-.3-10.457a.6.6,0,0,1,.486-.635l4.932-.525a.5.5,0,0,1,.519.528l.3,10.457A.6.6,0,0,1,356.682,202.69Z" transform="translate(-350.499 -191.067)" fill="#fff" opacity="0.6"/>
                          <path id="Path_216" data-name="Path 216" d="M356.044,202.757l-4.931.525a.5.5,0,0,1-.52-.527l-.3-10.457a.6.6,0,0,1,.486-.635l4.931-.525a.5.5,0,0,1,.52.528l.3,10.457A.6.6,0,0,1,356.044,202.757Z" transform="translate(-350.296 -191.089)" fill="#263238"/>
                          <path id="Path_217" data-name="Path 217" d="M356.044,202.757l-4.931.525a.5.5,0,0,1-.52-.527l-.3-10.457a.6.6,0,0,1,.486-.635l4.931-.525a.5.5,0,0,1,.52.528l.3,10.457A.6.6,0,0,1,356.044,202.757Z" transform="translate(-350.296 -191.089)" fill="#fff" opacity="0.7"/>
                          <path id="Path_218" data-name="Path 218" d="M355.8,191.438l-1.29.137-.167.4-2,.213-.188-.361-1.289.137a.391.391,0,0,0-.316.412l.3,10.457a.323.323,0,0,0,.337.342l4.932-.525a.391.391,0,0,0,.316-.412l-.3-10.457A.324.324,0,0,0,355.8,191.438Z" transform="translate(-350.378 -191.185)" fill="#407bff"/>
                          <path id="Path_219" data-name="Path 219" d="M355.425,196.171l-3.628.386a.318.318,0,0,1-.331-.335l-.029-1.009a.383.383,0,0,1,.309-.4l3.629-.386a.318.318,0,0,1,.331.336l.029,1.009A.382.382,0,0,1,355.425,196.171Z" transform="translate(-350.661 -192.14)" fill="#fff" opacity="0.8"/>
                        </g>
                      </g>
                    </g>
                  </svg>
                  
            </div>
        </div>        
    </div>
    <!-- landing -->
@endsection