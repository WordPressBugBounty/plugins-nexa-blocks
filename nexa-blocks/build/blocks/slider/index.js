(()=>{var e,t={4452:(e,t,l)=>{"use strict";const o=window.wp.blocks,n=window.wp.i18n,a="sliderHeight",r=[{label:(0,n.__)("Random","nexa-blocks"),value:"random"},{label:(0,n.__)("Dots","nexa-blocks"),value:"dots"},{label:(0,n.__)("Fly Eye","nexa-blocks"),value:"flyeye"},{label:(0,n.__)("Morph X","nexa-blocks"),value:"morph-x"},{label:(0,n.__)("Morph Y","nexa-blocks"),value:"morph-y"},{label:(0,n.__)("Page Curl","nexa-blocks"),value:"page-curl"},{label:(0,n.__)("Peel X","nexa-blocks"),value:"peel-x"},{label:(0,n.__)("Peel Y","nexa-blocks"),value:"peel-y"},{label:(0,n.__)("Polygons Fall","nexa-blocks"),value:"polygons-fall"},{label:(0,n.__)("Polygons Morph","nexa-blocks"),value:"polygons-morph"},{label:(0,n.__)("Polygons Wind","nexa-blocks"),value:"polygons-wind"},{label:(0,n.__)("Pixelize","nexa-blocks"),value:"pixelize"},{label:(0,n.__)("Ripple","nexa-blocks"),value:"ripple"},{label:(0,n.__)("Shutters","nexa-blocks"),value:"shutters"},{label:(0,n.__)("Slices","nexa-blocks"),value:"slices"},{label:(0,n.__)("Squares","nexa-blocks"),value:"squares"},{label:(0,n.__)("Stretch","nexa-blocks"),value:"stretch"},{label:(0,n.__)("Wave X","nexa-blocks"),value:"wave-x"},{label:(0,n.__)("Wind","nexa-blocks"),value:"wind"}],s=[{label:(0,n.__)("Top Left","nexa-blocks"),value:"top_left"},{label:(0,n.__)("Top Center","nexa-blocks"),value:"top_center"},{label:(0,n.__)("Top Right","nexa-blocks"),value:"top_right"},{label:(0,n.__)("Center Left","nexa-blocks"),value:"center_left"},{label:(0,n.__)("Center Center","nexa-blocks"),value:"center_center"},{label:(0,n.__)("Center Right","nexa-blocks"),value:"center_right"},{label:(0,n.__)("Bottom Left","nexa-blocks"),value:"bottom_left"},{label:(0,n.__)("Bottom Center","nexa-blocks"),value:"bottom_center"},{label:(0,n.__)("Bottom Right","nexa-blocks"),value:"bottom_right"}],i=[{label:(0,n.__)("Bullets","nexa-blocks"),value:"bullets"},{label:(0,n.__)("Fraction","nexa-blocks"),value:"fraction"},{label:(0,n.__)("Progress Bar","nexa-blocks"),value:"progressbar"}],c=[{label:(0,n.__)("Normal","nexa-blocks"),value:"normal"},{label:(0,n.__)("Active","nexa-blocks"),value:"hover"}],b="contentWidth",m="contentMargin",p="contentAlign",d="subTitleTypo",u="subTitleMargin",x="titleTypo",v="titleMargin",g="descTypo",y="descMargin",_="btnBorder",k="btnRadius",h="btnTypo",w="btnPadding",S="btnMargin",N="btnBg",f="btnHBg",E="iconGap",C="navWidth",$="navHeight",A="navSize",B="navBorder",T="navRadius",P="navBg",j="navHBg",R="pnbWidth",M="pnbHeight",D="pnbBorder",O="pnbRadius",I="pabWidth",F="pabHeight",H="pabBorder",q="pabRadius",W="fbTypo",G="pbHeight",{generateBackgroundAttributes:z,generateBorderAttributes:L,generateResBoxControlAttributes:X,generateResRangeAttributes:J,generateTypographyAttributes:Y,generateAlignmentAttributes:V}=window.nexaModules,K={globalSettings:{type:"object",default:{padding:{controlName:"mainPadding"},margin:{controlName:"mainMargin"},border:{controlName:"mainBorder"},borderRadius:{controlName:"mainBorderRadius"},boxShadow:{controlName:"mainBoxShadow"},bg:{controlName:"mainBg"}}},sliderStatus:{type:"boolean",default:!1},effect:{type:"string"},autoPlay:{type:"boolean",default:!1},autoPlayDelay:{type:"number",default:3e3},loop:{type:"boolean",default:!1},speed:{type:"number",default:800},showNavigation:{type:"boolean",default:!0},showPagination:{type:"boolean",default:!1},paginationType:{type:"string",default:"bullets"},contentPosition:{type:"string",default:"center_center"},showSubTitle:{type:"boolean",default:!1},showTitle:{type:"boolean",default:!0},showDescription:{type:"boolean",default:!1},showBtn:{type:"boolean",default:!1},nx_subTitleColor:{type:"string"},nx_titleColor:{type:"string"},nx_descColor:{type:"string"},nx_btnColors:{type:"object",default:{normal:"",hover:""}},nx_navColors:{type:"object",default:{normal:"",hover:""}},nx_bulletColors:{type:"object",default:{normal:"",active:""}},nx_factionColor:{type:"string"},nx_paginationColors:{type:"object",default:{normal:"",active:""}},...J({controlName:b}),...X({controlName:m}),...V({controlName:p}),...Y({controlName:d}),...X({controlName:u}),...Y({controlName:x}),...X({controlName:v}),...Y({controlName:g}),...X({controlName:y}),...Y({controlName:h}),...L({controlName:_}),...X({controlName:k}),...z({controlName:N}),...z({controlName:f}),...X({controlName:w}),...X({controlName:S}),...J({controlName:E}),...J({controlName:a}),...L({controlName:B}),...X({controlName:T}),...z({controlName:P}),...z({controlName:j}),...J({controlName:C}),...J({controlName:$}),...J({controlName:A}),...J({controlName:R}),...J({controlName:M}),...L({controlName:D}),...X({controlName:O}),...J({controlName:I}),...J({controlName:F}),...L({controlName:H}),...X({controlName:q}),...Y({controlName:W}),...J({controlName:G})},Q=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"nexa/slider","version":"1.0.0","title":"Slider","category":"nexa-blocks","description":"Show content in sliding mode.","supports":{"html":false,"align":["wide","full"],"className":false,"customClassName":false},"providesContext":{"nexa/sliderStatus":"sliderStatus","nexa/showSubTitle":"showSubTitle","nexa/showTitle":"showTitle","nexa/showDescription":"showDescription","nexa/showBtn":"showBtn","nexa/contentPosition":"contentPosition"},"example":{},"textdomain":"nexa-blocks","editorScript":["file:./index.js","nx-swiper-gl"],"editorStyle":["file:./index.css","nx-swiper-gl"],"style":["file:./style-index.css","nx-swiper-gl-style"],"viewScript":["file:./frontend.js","nx-swiper-gl-script"]}'),U=window.React,Z=window.wp.blockEditor,ee=window.wp.element,te=window.wp.components;var le=l(6942),oe=l.n(le);const ne=window.wp.data,ae=(e,t=[])=>{let l="";return t.forEach((e=>{if(""!==e?.v&&null!=e?.v&&!1!==e?.v&&"-null"!==e?.v)if(e?.p){const t=e.i?" !important":"";l+=`${e.p}:${e.v}${t};`}else{const t=e.v.trim();e.i?l+=t.endsWith(";")?t.slice(0,-1)+" !important;":`${t} !important;`:l+=t.endsWith(";")?t:`${t};`}})),l?`${e}{${l}}`:""},re=e=>"object"!=typeof e?"":[...new Set(e)].join(" "),{AdvancedSettings:se,HeaderTabs:ie,ColorControl:ce,SwitcherControl:be,BackgroundControl:me,BorderControl:pe,ResBoxControl:de,ResRangeControl:ue,TypographyControl:xe,SingleRangeControl:ve,AlignmentControl:ge}=window.nexaModules,ye=e=>{const{attributes:t,setAttributes:l}=e,{contentPosition:o,effect:z,autoPlay:L,autoPlayDelay:X,loop:J,speed:Y,showNavigation:V,showPagination:Q,paginationType:ee,showSubTitle:le,showTitle:oe,showDescription:ne,showBtn:ae,nx_subTitleColor:re,nx_titleColor:ye,nx_descColor:_e,nx_btnColors:ke,nx_navColors:he,nx_bulletColors:we,nx_factionColor:Se,nx_paginationColors:Ne}=t,fe={attributes:t,setAttributes:l,objAttributes:K};return(0,U.createElement)(Z.InspectorControls,null,(0,U.createElement)(ie,{generalControls:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(te.PanelBody,{title:(0,n.__)("General","nexa-blocks"),initialOpen:!0},(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Show Subtitle","nexa-blocks"),checked:le,onChange:()=>l({showSubTitle:!le})}),(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Show Title","nexa-blocks"),checked:oe,onChange:()=>l({showTitle:!oe})}),(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Show Description","nexa-blocks"),checked:ne,onChange:()=>l({showDescription:!ne})}),(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Show Button","nexa-blocks"),checked:ae,onChange:()=>l({showBtn:!ae})})),(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Slider","nexa-blocks"),initialOpen:!1},(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Loop","nexa-blocks"),checked:J,onChange:()=>{l({loop:!J})}}),(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Autoplay","nexa-blocks"),checked:L,onChange:()=>{l({autoPlay:!L})}}),L&&(0,U.createElement)(ve,{label:(0,n.__)("Autoplay Delay (ms)","nexa-blocks"),value:X,onChange:e=>l({autoPlayDelay:e}),onClickReset:()=>l({autoPlayDelay:3e3}),min:100,max:1e4,step:100}),(0,U.createElement)(ve,{label:(0,n.__)(" Speed (ms)","nexa-blocks"),value:Y,onChange:e=>l({speed:e}),onClickReset:()=>l({speed:800}),min:100,max:4e3,step:100}),(0,U.createElement)(te.SelectControl,{label:(0,n.__)("Effect","nexa-blocks"),value:z,onChange:e=>{l({effect:e})},options:r,help:(0,n.__)("Effects only work at the frontend preview","nexa-blocks")}),(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Show Navigation","nexa-blocks"),checked:V,onChange:()=>{l({showNavigation:!V})}}),(0,U.createElement)(te.ToggleControl,{label:(0,n.__)("Show Pagination","nexa-blocks"),checked:Q,onChange:()=>{l({showPagination:!Q})}}),Q&&(0,U.createElement)(te.SelectControl,{label:(0,n.__)("Pagination Type","nexa-blocks"),value:ee,onChange:e=>l({paginationType:e}),options:i})),(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Content","nexa-blocks"),initialOpen:!1},(0,U.createElement)(ge,{label:(0,n.__)("Alignment","nexa-blocks"),controlName:p,objAttrs:fe}),(0,U.createElement)(ue,{label:(0,n.__)("Max Width","nexa-blocks"),controlName:b,objAttrs:fe,min:1,max:2e3,units:["px","%"]}),(0,U.createElement)(te.SelectControl,{label:(0,n.__)("Position","nexa-blocks"),value:o,onChange:e=>l({contentPosition:e}),options:s}))),styleControls:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Slider","nexa-blocks"),initialOpen:!0},(0,U.createElement)(ue,{label:(0,n.__)("Height","nexa-blocks"),controlName:a,objAttrs:fe,min:1,max:1e3})),(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Content","nexa-blocks"),initialOpen:!1},(0,U.createElement)(de,{label:(0,n.__)("Margin","nexa-blocks"),controlName:m,objAttrs:fe})),le&&(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Sub Title","nexa-blocks"),initialOpen:!0},(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:re,onChange:e=>{l({nx_subTitleColor:e})}}),(0,U.createElement)(xe,{label:(0,n.__)("Typography","nexa-blocks"),controlName:d,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Margin","nexa-blocks"),controlName:u,objAttrs:fe})),oe&&(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Title","nexa-blocks"),initialOpen:!1},(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:ye,onChange:e=>{l({nx_titleColor:e})}}),(0,U.createElement)(xe,{label:(0,n.__)("Typography","nexa-blocks"),controlName:x,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Margin","nexa-blocks"),controlName:v,objAttrs:fe})),ne&&(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Description","nexa-blocks"),initialOpen:!1},(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:_e,onChange:e=>{l({nx_descColor:e})}}),(0,U.createElement)(xe,{label:(0,n.__)("Typography","nexa-blocks"),controlName:g,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Margin","nexa-blocks"),controlName:y,objAttrs:fe})),ae&&(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Button","nexa-blocks"),initialOpen:!1},(0,U.createElement)(xe,{label:(0,n.__)("Typography","nexa-blocks"),controlName:h,objAttrs:fe}),(0,U.createElement)(pe,{controlName:_,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Border Radius","nexa-blocks"),controlName:k,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Padding","nexa-blocks"),controlName:w,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Margin","nexa-blocks"),controlName:S,objAttrs:fe}),(0,U.createElement)(ue,{label:(0,n.__)("Icon Gap","nexa-blocks"),controlName:E,objAttrs:fe,min:0,max:100}),(0,U.createElement)(be,{normal:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:ke?.normal,onChange:e=>l({nx_btnColors:{...ke,normal:e}})}),(0,U.createElement)(me,{label:(0,n.__)("Background","nexa-blocks"),controlName:N,objAttrs:fe})),hover:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Hover Color","nexa-blocks"),color:ke?.hover,onChange:e=>l({nx_btnColors:{...ke,hover:e}})}),(0,U.createElement)(me,{label:(0,n.__)("Background","nexa-blocks"),controlName:f,objAttrs:fe}))})),V&&(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Navigation","nexa-blocks"),initialOpen:!1},(0,U.createElement)(ue,{label:(0,n.__)("Width","nexa-blocks"),controlName:C,objAttrs:fe,min:1,max:200}),(0,U.createElement)(ue,{label:(0,n.__)("Height","nexa-blocks"),controlName:$,objAttrs:fe,min:1,max:200}),(0,U.createElement)(ue,{label:(0,n.__)("Icon Size","nexa-blocks"),controlName:A,objAttrs:fe,min:1,max:100}),(0,U.createElement)(pe,{controlName:B,objAttrs:fe}),(0,U.createElement)(de,{label:(0,n.__)("Border Radius","nexa-blocks"),controlName:T,objAttrs:fe}),(0,U.createElement)(be,{normal:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:he?.normal,onChange:e=>l({nx_navColors:{...he,normal:e}})}),(0,U.createElement)(me,{label:(0,n.__)("Background","nexa-blocks"),controlName:P,objAttrs:fe})),hover:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Hover Color","nexa-blocks"),color:he?.hover,onChange:e=>l({nx_navColors:{...he,hover:e}})}),(0,U.createElement)(me,{label:(0,n.__)("Background","nexa-blocks"),controlName:j,objAttrs:fe})),options:c})),Q&&(0,U.createElement)(te.PanelBody,{title:(0,n.__)("Pagination","nexa-blocks"),initialOpen:!1},"bullets"===ee&&(0,U.createElement)(U.Fragment,null,(0,U.createElement)(be,{normal:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:we?.normal,onChange:e=>l({nx_bulletColors:{...we,normal:e}})}),(0,U.createElement)(ue,{label:(0,n.__)("Width","nexa-blocks"),controlName:R,objAttrs:fe,min:1,max:200}),(0,U.createElement)(ue,{label:(0,n.__)("Height","nexa-blocks"),controlName:M,objAttrs:fe,min:1,max:200}),(0,U.createElement)(pe,{controlName:D,objAttrs:fe,noHover:!0}),(0,U.createElement)(de,{label:(0,n.__)("Border Radius","nexa-blocks"),controlName:O,objAttrs:fe})),hover:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:we?.active,onChange:e=>l({nx_bulletColors:{...we,active:e}})}),(0,U.createElement)(ue,{label:(0,n.__)("Width","nexa-blocks"),controlName:I,objAttrs:fe,min:1,max:200}),(0,U.createElement)(ue,{label:(0,n.__)("Height","nexa-blocks"),controlName:F,objAttrs:fe,min:1,max:200}),(0,U.createElement)(pe,{controlName:H,objAttrs:fe,noHover:!0}),(0,U.createElement)(de,{label:(0,n.__)("Border Radius","nexa-blocks"),controlName:q,objAttrs:fe})),options:c})),"fraction"===ee&&(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:Se,onChange:e=>l({nx_factionColor:e})}),(0,U.createElement)(xe,{label:(0,n.__)("Typography","nexa-blocks"),controlName:W,objAttrs:fe})),"progressbar"===ee&&(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ue,{label:(0,n.__)("Height","nexa-blocks"),controlName:G,objAttrs:fe,min:1,max:200}),(0,U.createElement)(be,{normal:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Color","nexa-blocks"),color:Ne?.normal,onChange:e=>l({nx_paginationColors:{...Ne,normal:e}})})),hover:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(ce,{label:(0,n.__)("Hover Color","nexa-blocks"),color:Ne?.hover,onChange:e=>l({nx_paginationColors:{...Ne,hover:e}})})),options:c})))),advancedControls:(0,U.createElement)(U.Fragment,null,(0,U.createElement)(se,{attributes:t,setAttributes:l,objAttrs:fe}))}))},{generateAlignmentStyles:_e,generateBorderStyles:ke,generateResBoxStyles:he,generateBgStyles:we,generateRangeStyles:Se,generateTypographyStyles:Ne,GlobalStyleHandler:fe}=window.nexaModules,Ee=e=>{const{attributes:t,setAttributes:l}=e,{uniqueId:o,nx_subTitleColor:n,nx_titleColor:r,nx_descColor:s,nx_btnColors:i,nx_navColors:c,nx_bulletColors:z,nx_factionColor:L,nx_paginationColors:X}=t,{deskStyle:J,tabStyle:Y,mobStyle:V}=Se({controlName:a,attributes:t,propertyName:"height"}),{deskAlign:K,tabAlign:Q,mobAlign:Z}=_e({controlName:p,attributes:t,propertyName:"text-align"}),{boxDeskStyles:ee,boxTabStyles:te,boxMobStyles:le}=he({controlName:m,attributes:t,propertyName:"margin",forRadius:!1}),{deskStyle:oe,tabStyle:ne,mobStyle:re}=Se({controlName:b,attributes:t,propertyName:"max-width"}),{desktopStyles:se,tabletStyles:ie,mobileStyles:ce}=Ne({controlName:d,attributes:t}),{boxDeskStyles:be,boxTabStyles:me,boxMobStyles:pe}=he({controlName:u,attributes:t,propertyName:"margin",forRadius:!1}),{desktopStyles:de,tabletStyles:ue,mobileStyles:xe}=Ne({controlName:x,attributes:t}),{boxDeskStyles:ve,boxTabStyles:ge,boxMobStyles:ye}=he({controlName:v,attributes:t,propertyName:"margin",forRadius:!1}),{desktopStyles:Ee,tabletStyles:Ce,mobileStyles:$e}=Ne({controlName:g,attributes:t}),{boxDeskStyles:Ae,boxTabStyles:Be,boxMobStyles:Te}=he({controlName:y,attributes:t,propertyName:"margin",forRadius:!1}),{desktopStyles:Pe,tabletStyles:je,mobileStyles:Re}=Ne({controlName:h,attributes:t}),{desktopStyles:Me,tabletStyles:De,mobileStyles:Oe,hoverColor:Ie}=ke({controlName:_,attributes:t}),{boxDeskStyles:Fe,boxTabStyles:He,boxMobStyles:qe}=he({controlName:k,attributes:t,propertyName:"border-radius",forRadius:!0}),{bgStyle:We}=we({controlName:N,attributes:t}),{bgStyle:Ge}=we({controlName:f,attributes:t}),{boxDeskStyles:ze,boxTabStyles:Le,boxMobStyles:Xe}=he({controlName:w,attributes:t,propertyName:"padding",forRadius:!1}),{boxDeskStyles:Je,boxTabStyles:Ye,boxMobStyles:Ve}=he({controlName:S,attributes:t,propertyName:"margin",forRadius:!1}),{deskStyle:Ke,tabStyle:Qe,mobStyle:Ue}=Se({controlName:E,attributes:t,propertyName:"gap"}),{deskStyle:Ze,tabStyle:et,mobStyle:tt}=Se({controlName:C,attributes:t,propertyName:"width"}),{deskStyle:lt,tabStyle:ot,mobStyle:nt}=Se({controlName:$,attributes:t,propertyName:"height"}),{deskStyle:at,tabStyle:rt,mobStyle:st}=Se({controlName:A,attributes:t,propertyName:"font-size"}),{desktopStyles:it,tabletStyles:ct,mobileStyles:bt,hoverColor:mt}=ke({controlName:B,attributes:t}),{boxDeskStyles:pt,boxTabStyles:dt,boxMobStyles:ut}=he({controlName:T,attributes:t,propertyName:"border-radius",forRadius:!0}),{bgStyle:xt}=we({controlName:P,attributes:t}),{bgStyle:vt}=we({controlName:j,attributes:t}),{deskStyle:gt,tabStyle:yt,mobStyle:_t}=Se({controlName:R,attributes:t,propertyName:"width"}),{deskStyle:kt,tabStyle:ht,mobStyle:wt}=Se({controlName:M,attributes:t,propertyName:"height"}),{desktopStyles:St,tabletStyles:Nt,mobileStyles:ft}=ke({controlName:D,attributes:t}),{boxDeskStyles:Et,boxTabStyles:Ct,boxMobStyles:$t}=he({controlName:O,attributes:t,propertyName:"border-radius",forRadius:!0}),{deskStyle:At,tabStyle:Bt,mobStyle:Tt}=Se({controlName:I,attributes:t,propertyName:"width"}),{deskStyle:Pt,tabStyle:jt,mobStyle:Rt}=Se({controlName:F,attributes:t,propertyName:"height"}),{desktopStyles:Mt,tabletStyles:Dt,mobileStyles:Ot}=ke({controlName:H,attributes:t}),{boxDeskStyles:It,boxTabStyles:Ft,boxMobStyles:Ht}=he({controlName:q,attributes:t,propertyName:"border-radius",forRadius:!0}),{desktopStyles:qt,tabletStyles:Wt,mobileStyles:Gt}=Ne({controlName:W,attributes:t}),{deskStyle:zt,tabStyle:Lt,mobStyle:Xt}=Se({controlName:G,attributes:t,propertyName:"height"}),Jt=`\n        ${ae(`.${o}.wp-block-nexa-slider .swiper`,[{v:J}])}\n        ${ae(`.${o}.wp-block-nexa-slider .wp-block-nexa-slide-item .swiper-slide-content`,[{v:K},{v:ee},{v:oe}])}\n        ${ae(`.${o} .swiper-slide-subtitle`,[{v:se},{v:be},{p:"color",v:n}])}\n        ${ae(`.${o} .swiper-slide-title`,[{v:de},{v:ve},{p:"color",v:r}])}\n        ${ae(`.${o} .swiper-slide-description`,[{v:Ee},{v:Ae},{p:"color",v:s}])}\n        ${ae(`.${o} .swiper-slide-btn`,[{p:"color",v:i?.normal},{v:We},{v:Pe},{v:Me},{v:Fe},{v:ze},{v:Je},{v:Ke}])}\n        ${ae(`.${o} .swiper-slide-btn:hover`,[{p:"color",v:i?.hover},{v:Ie},{v:Ge}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav`,[{v:it},{v:pt},{v:Ze},{v:lt},{v:xt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav:hover`,[{v:vt},{v:mt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav:after`,[{v:at},{p:"color",v:c?.normal}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav:hover:after`,[{p:"color",v:c?.hover}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-bullet`,[{p:"background-color",v:z?.normal},{v:gt},{v:kt},{v:St},{v:Et}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-bullet-active`,[{p:"background-color",v:z?.active},{v:At},{v:Pt},{v:Mt},{v:It}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-fraction`,[{p:"color",v:L},{v:qt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-progressbar`,[{p:"background-color",v:X?.normal},{v:zt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-progressbar .swiper-pagination-progressbar-fill`,[{p:"background-color",v:X?.hover}])}\n    `,Yt=`\n        ${ae(`.${o}.wp-block-nexa-slider .swiper`,[{v:Y}])}\n        ${ae(`.${o}.wp-block-nexa-slider .wp-block-nexa-slide-item .swiper-slide-content`,[{v:Q},{v:te},{v:ne}])}\n        ${ae(`.${o} .swiper-slide-subtitle`,[{v:ie},{v:me}])}\n        ${ae(`.${o} .swiper-slide-title`,[{v:ue},{v:ge}])}\n        ${ae(`.${o} .swiper-slide-description`,[{v:Ce},{v:Be}])}\n        ${ae(`.${o} .swiper-slide-btn`,[{v:je},{v:De},{v:He},{v:Le},{v:Ye},{v:Qe}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav`,[{v:ct},{v:dt},{v:et},{v:ot}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav:after`,[{v:rt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-bullet`,[{v:yt},{v:ht},{v:Nt},{v:Ct}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-bullet-active`,[{v:Bt},{v:jt},{v:Dt},{v:Ft}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-fraction`,[{v:Wt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-progressbar`,[{v:Lt}])}\n    `,Vt=`\n        ${ae(`.${o}.wp-block-nexa-slider .swiper`,[{v:V}])}\n        ${ae(`.${o}.wp-block-nexa-slider .wp-block-nexa-slide-item .swiper-slide-content`,[{v:Z},{v:le},{v:re}])}\n        ${ae(`.${o} .swiper-slide-subtitle`,[{v:ce},{v:pe}])}\n        ${ae(`.${o} .swiper-slide-title`,[{v:xe},{v:ye}])}\n        ${ae(`.${o} .swiper-slide-description`,[{v:$e},{v:Te}])}\n        ${ae(`.${o} .swiper-slide-btn`,[{v:Re},{v:Oe},{v:qe},{v:Xe},{v:Ve},{v:Ue}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav`,[{v:bt},{v:ut},{v:tt},{v:nt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .nx-slider-nav:after`,[{v:st}])}\n         ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-bullet`,[{v:_t},{v:wt},{v:ft},{v:$t}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-bullet-active`,[{v:Tt},{v:Rt},{v:Ot},{v:Ht}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-fraction`,[{v:Gt}])}\n        ${ae(`.${o}.wp-block-nexa-slider .swiper-pagination-progressbar`,[{v:Xt}])}\n    `;return(0,U.createElement)(fe,{attributes:t,setAttributes:l,deskStyles:Jt,tabStyles:Yt,mobStyles:Vt})},{BlockIcons:Ce}=window?.nexaModules;(0,o.registerBlockType)(Q,{icon:{src:Ce?.default.slider},attributes:K,edit:e=>{const{attributes:t,setAttributes:l,clientId:o,isSelected:a}=e,{uniqueId:r,nexaId:s,parentClassess:i,preset:c,effect:b,sliderStatus:m,loop:p,speed:d,autoPlay:u,autoPlayDelay:x,showNavigation:v,showPagination:g,paginationType:y}=t;(0,ee.useEffect)((()=>{(({uniqueId:e,setAttributes:t,clientId:l})=>{const o="nexa-blocks-"+Math.random().toString(36).substr(2,8);if(!e)return void t({uniqueId:o});const n=(0,ne.select)("core/block-editor").getBlocks();let a=!1;const r=n=>{if(!a)for(const s of n){const{innerBlocks:n}=s;if(s.attributes.uniqueId===e){if(s.clientId!==l)return t({uniqueId:o}),void(a=!0);n.length>0&&r(n)}else n.length>0&&r(n)}};r(n)})({uniqueId:r,setAttributes:l,clientId:o})}),[]);const _=(0,Z.useBlockProps)({className:oe()(r,c,re(i))}),k=(0,Z.useInnerBlocksProps)({className:"swiper-wrapper"},{allowedBlocks:["nexa/slide-item"],template:[["nexa/slide-item"],["nexa/slide-item"],["nexa/slide-item"]],renderAppender:!1}),h=(0,ee.useRef)(null);(0,ee.useEffect)((()=>{var e;h.current&&(e=h.current).addEventListener("click",(function(t){t.preventDefault();const l=e.querySelector(".wp-block-nexa-slider");l&&l.contains(t.target)&&(dispatch("core/block-editor").selectBlock(o),dispatch("core/edit-post").openGeneralSidebar("edit-post/block"))}))}),[]),(0,ee.useEffect)((()=>{if(h){const e=h.current.querySelector(".swiper-button-prev"),t=h.current.querySelector(".swiper-button-next"),l=h.current.querySelector(".swiper-pagination"),o={speed:d,effect:"gl",loop:p,autoplay:!!u&&{delay:x},navigation:!!v&&{prevEl:e,nextEl:t},pagination:!!g&&{clickable:!0,el:l,type:y}};setTimeout((()=>{!function(e,t){e?.swiper&&e.swiper.destroy(),new Swiper(e,t)}(h.current,o)}),1e3)}}),[p,u,x,d,v,g,y,m]);const w=wp.data.select("core/block-editor").getBlocks(o);return(0,U.createElement)(ee.Fragment,null,a&&(0,U.createElement)(ye,{...e}),(0,U.createElement)(Ee,{...e}),(0,U.createElement)(Z.BlockControls,null,(0,U.createElement)(te.ToolbarGroup,null,(0,U.createElement)(te.ToolbarButton,{icon:"insert",label:(0,n.__)("Add Slide","nexa-blocks"),onClick:()=>(()=>{const e=wp.blocks.createBlock("nexa/slide-item",{title:"New Slide Item"});wp.data.dispatch("core/block-editor").insertBlocks(e,w.length,o),l({sliderStatus:!m})})()}))),(0,U.createElement)("div",{..._,...s&&{id:s}},(0,U.createElement)("div",{className:"swiper",ref:h},(0,U.createElement)("div",{...k}),v&&(0,U.createElement)(ee.Fragment,null,(0,U.createElement)("div",{className:"swiper-button-prev nx-slider-nav"}),(0,U.createElement)("div",{className:"swiper-button-next nx-slider-nav"})),g&&(0,U.createElement)("div",{className:"swiper-pagination"}))))},save:e=>{const{attributes:t}=e,{uniqueId:l,nexaId:o,preset:n,parentClassess:a,effect:r,autoPlay:s,autoPlayDelay:i,loop:c,speed:b,showNavigation:m,showPagination:p,paginationType:d}=t,u=Z.useBlockProps.save({className:oe()("wp-block-nexa-slider",l,n,re(a))}),x={autoPlay:s,autoPlayDelay:i,loop:c,speed:b,showNavigation:m,showPagination:p,paginationType:d};return(0,U.createElement)("div",{...u,...o&&{id:o},...r&&void 0!==r&&{"data-effect":r},"data-options":JSON.stringify(x)},(0,U.createElement)("div",{className:"swiper"},(0,U.createElement)("div",{className:"swiper-wrapper"},(0,U.createElement)(Z.InnerBlocks.Content,null)),m&&(0,U.createElement)(U.Fragment,null,(0,U.createElement)("div",{className:"swiper-button-prev nx-slider-nav"}),(0,U.createElement)("div",{className:"swiper-button-next nx-slider-nav"})),p&&(0,U.createElement)("div",{className:"swiper-pagination"})))}})},6942:(e,t)=>{var l;!function(){"use strict";var o={}.hasOwnProperty;function n(){for(var e="",t=0;t<arguments.length;t++){var l=arguments[t];l&&(e=r(e,a(l)))}return e}function a(e){if("string"==typeof e||"number"==typeof e)return e;if("object"!=typeof e)return"";if(Array.isArray(e))return n.apply(null,e);if(e.toString!==Object.prototype.toString&&!e.toString.toString().includes("[native code]"))return e.toString();var t="";for(var l in e)o.call(e,l)&&e[l]&&(t=r(t,l));return t}function r(e,t){return t?e?e+" "+t:e+t:e}e.exports?(n.default=n,e.exports=n):void 0===(l=function(){return n}.apply(t,[]))||(e.exports=l)}()}},l={};function o(e){var n=l[e];if(void 0!==n)return n.exports;var a=l[e]={exports:{}};return t[e](a,a.exports,o),a.exports}o.m=t,e=[],o.O=(t,l,n,a)=>{if(!l){var r=1/0;for(b=0;b<e.length;b++){for(var[l,n,a]=e[b],s=!0,i=0;i<l.length;i++)(!1&a||r>=a)&&Object.keys(o.O).every((e=>o.O[e](l[i])))?l.splice(i--,1):(s=!1,a<r&&(r=a));if(s){e.splice(b--,1);var c=n();void 0!==c&&(t=c)}}return t}a=a||0;for(var b=e.length;b>0&&e[b-1][2]>a;b--)e[b]=e[b-1];e[b]=[l,n,a]},o.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return o.d(t,{a:t}),t},o.d=(e,t)=>{for(var l in t)o.o(t,l)&&!o.o(e,l)&&Object.defineProperty(e,l,{enumerable:!0,get:t[l]})},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={9098:0,9566:0};o.O.j=t=>0===e[t];var t=(t,l)=>{var n,a,[r,s,i]=l,c=0;if(r.some((t=>0!==e[t]))){for(n in s)o.o(s,n)&&(o.m[n]=s[n]);if(i)var b=i(o)}for(t&&t(l);c<r.length;c++)a=r[c],o.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return o.O(b)},l=globalThis.webpackChunknexa_blocks=globalThis.webpackChunknexa_blocks||[];l.forEach(t.bind(null,0)),l.push=t.bind(null,l.push.bind(l))})();var n=o.O(void 0,[9566],(()=>o(4452)));n=o.O(n)})();