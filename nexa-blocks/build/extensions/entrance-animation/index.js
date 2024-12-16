(()=>{"use strict";const e=window.React,n=window.wp.i18n,t=window.wp.hooks,a=window.wp.components,o=window.wp.element,{SingleRangeControl:l}=window.nexaModules;(0,t.addFilter)("nexa.advanced.motionPanels","nexa/motionPanels",(function(t,c,i){const{entranceAnimation:_,entranceAnimationDuration:r,entranceAnimationDelay:m,entranceAnimationRepeat:p,loopEntranceAnimation:s}=c,[b,u]=(0,o.useState)(!1);return t.push((()=>(0,e.createElement)(a.PanelBody,{title:(0,n.__)("Motion Effects","nexa-blocks"),initialOpen:b},(0,e.createElement)(a.SelectControl,{label:(0,n.__)("Entrance Animation","nexa-blocks"),onChange:e=>{i({entranceAnimation:e}),u(!0)},value:_},(0,e.createElement)("option",{value:""},(0,n.__)("None","nexa-blocks")),(0,e.createElement)("option",{value:"bounce"},(0,n.__)("Bounce","nexa-blocks")),(0,e.createElement)("option",{value:"flash"},(0,n.__)("Flash","nexa-blocks")),(0,e.createElement)("option",{value:"pulse"},(0,n.__)("Pulse","nexa-blocks")),(0,e.createElement)("option",{value:"rubberBand"},(0,n.__)("Rubber Band","nexa-blocks")),(0,e.createElement)("option",{value:"shakeX"},(0,n.__)("Shake X","nexa-blocks")),(0,e.createElement)("option",{value:"shakeY"},(0,n.__)("Shake Y","nexa-blocks")),(0,e.createElement)("option",{value:"headShake"},(0,n.__)("Head Shake","nexa-blocks")),(0,e.createElement)("option",{value:"swing"},(0,n.__)("Swing","nexa-blocks")),(0,e.createElement)("option",{value:"tada"},(0,n.__)("Tada","nexa-blocks")),(0,e.createElement)("option",{value:"wobble"},(0,n.__)("Wobble","nexa-blocks")),(0,e.createElement)("option",{value:"jello"},(0,n.__)("Jello","nexa-blocks")),(0,e.createElement)("option",{value:"heartBeat"},(0,n.__)("Heart Beat","nexa-blocks")),(0,e.createElement)("optgroup",{label:(0,n.__)("Fade","nexa-blocks")},(0,e.createElement)("option",{value:"fadeIn"},(0,n.__)("Fade In","nexa-blocks")),(0,e.createElement)("option",{value:"fadeInUp"},(0,n.__)("Fade In Up","nexa-blocks")),(0,e.createElement)("option",{value:"fadeInDown"},(0,n.__)("Fade In Down","nexa-blocks")),(0,e.createElement)("option",{value:"fadeInLeft"},(0,n.__)("Fade In Left","nexa-blocks")),(0,e.createElement)("option",{value:"fadeInRight"},(0,n.__)("Fade In Right","nexa-blocks"))),(0,e.createElement)("optgroup",{label:(0,n.__)("Zoom","nexa-blocks")},(0,e.createElement)("option",{value:"zoomIn"},(0,n.__)("Zoom In","nexa-blocks")),(0,e.createElement)("option",{value:"zoomInDown"},(0,n.__)("Zoom In Down","nexa-blocks")),(0,e.createElement)("option",{value:"zoomInLeft"},(0,n.__)("Zoom In Left","nexa-blocks")),(0,e.createElement)("option",{value:"zoomInRight"},(0,n.__)("Zoom In Right","nexa-blocks")),(0,e.createElement)("option",{value:"zoomInUp"},(0,n.__)("Zoom In Up","nexa-blocks"))),(0,e.createElement)("optgroup",{label:(0,n.__)("Slide","nexa-blocks")},(0,e.createElement)("option",{value:"slideInDown"},(0,n.__)("Slide In Down","nexa-blocks")),(0,e.createElement)("option",{value:"slideInLeft"},(0,n.__)("Slide In Left","nexa-blocks")),(0,e.createElement)("option",{value:"slideInRight"},(0,n.__)("Slide In Right","nexa-blocks")),(0,e.createElement)("option",{value:"slideInUp"},(0,n.__)("Slide In Up","nexa-blocks"))),(0,e.createElement)("optgroup",{label:(0,n.__)("Flip","nexa-blocks")},(0,e.createElement)("option",{value:"flipInX"},(0,n.__)("Flip In X","nexa-blocks")),(0,e.createElement)("option",{value:"flipInY"},(0,n.__)("Flip In Y","nexa-blocks"))),(0,e.createElement)("optgroup",{label:(0,n.__)("Light Speed","nexa-blocks")},(0,e.createElement)("option",{value:"lightSpeedInRight"},(0,n.__)("Light Speed In Right","nexa-blocks")),(0,e.createElement)("option",{value:"lightSpeedInLeft"},(0,n.__)("Light Speed In Left","nexa-blocks"))),(0,e.createElement)("optgroup",{label:(0,n.__)("Rotate","nexa-blocks")},(0,e.createElement)("option",{value:"rotateIn"},(0,n.__)("Rotate In","nexa-blocks")),(0,e.createElement)("option",{value:"rotateInDownLeft"},(0,n.__)("Rotate In Down Left","nexa-blocks")),(0,e.createElement)("option",{value:"rotateInDownRight"},(0,n.__)("Rotate In Down Right","nexa-blocks")),(0,e.createElement)("option",{value:"rotateInUpLeft"},(0,n.__)("Rotate In Up Left","nexa-blocks")),(0,e.createElement)("option",{value:"rotateInUpRight"},(0,n.__)("Rotate In Up Right","nexa-blocks")))),_&&(0,e.createElement)(e.Fragment,null,(0,e.createElement)(l,{label:(0,n.__)("Duration(s)","nexa-blocks"),value:r,onChange:e=>{i({entranceAnimationDuration:e}),u(!0)},onClickReset:()=>{i({entranceAnimationDuration:1}),u(!0)},min:0,max:10,step:.1}),(0,e.createElement)(l,{label:(0,n.__)("Delay(s)","nexa-blocks"),value:m,onChange:e=>{i({entranceAnimationDelay:e}),u(!0)},onClickReset:()=>{i({entranceAnimationDelay:0}),u(!0)},min:0,max:10,step:.1}),(0,e.createElement)(a.ToggleControl,{label:(0,n.__)("Animation on both Scrolls","nexa-blocks"),checked:p,onChange:()=>{i({entranceAnimationRepeat:!p}),u(!0)}}),(0,e.createElement)(a.ToggleControl,{label:(0,n.__)("Enable Loop Animation","nexa-blocks"),checked:s,onChange:()=>{i({loopEntranceAnimation:!s}),u(!0)}}))))),t}))})();