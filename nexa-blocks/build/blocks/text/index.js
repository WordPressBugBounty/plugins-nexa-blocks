(()=>{var e,t={966:(e,t,o)=>{"use strict";const l=window.wp.blocks,n=window.wp.i18n,a="labelTypo",r="labelMargin",s="fieldTypo",i="fieldBorder",c="fieldBradius",b="fieldPadding",d="fieldMargin",m="fieldBg",x="ficonSize",{generateBackgroundAttributes:u,generateBorderAttributes:p,generateResBoxControlAttributes:f,generateResRangeAttributes:g,generateTypographyAttributes:y}=window.nexaModules,h={globalSettings:{type:"object",default:{padding:{controlName:"mainPadding"},margin:{controlName:"mainMargin"},border:{controlName:"mainBorder"},borderRadius:{controlName:"mainBorderRadius"},boxShadow:{controlName:"mainBoxShadow"},bg:{controlName:"mainBg"}}},preset:{type:"string",default:"preset-1"},showLabel:{type:"boolean",default:!0},label:{type:"string",default:"Name"},isRequired:{type:"boolean",default:!1},isRequiredMessage:{type:"string",default:"This field is required."},showRequiredIcon:{type:"boolean",default:!0},showIcon:{type:"boolean",default:!1},icon:{type:"string",default:"fa-solid fa-user"},placeholderText:{type:"string",default:"Enter your name"},nx_labelColor:{type:"string"},nx_symbolColor:{type:"string"},nx_fieldColor:{type:"string"},nx_fieldPlaceholderColor:{type:"string"},nx_iconColor:{type:"string"},nx_btnColors:{type:"object",default:{normal:"",hover:""}},...y({controlName:a}),...f({controlName:r}),...y({controlName:s}),...p({controlName:i}),...f({controlName:c}),...f({controlName:b}),...f({controlName:d}),...u({controlName:m}),...g({controlName:x})},k=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"nexa/text","version":"1.0.0","title":"Text","category":"nexa-blocks","description":"Text field for Form Block","supports":{"html":false,"align":["wide","full"],"className":false,"customClassName":false},"example":{},"parent":["nexa/form","nexa/container"],"usesContext":["nexa/showFormIcon","nexa/showLabel"],"textdomain":"nexa-blocks","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css"}'),v=window.React,_=window.wp.blockEditor,w=window.wp.element;var C=o(6942),E=o.n(C);const N=window.wp.data,S=(e,t=[])=>{let o="";return t.forEach((e=>{if(""!==e?.v&&null!=e?.v&&!1!==e?.v&&"-null"!==e?.v)if(e?.p){const t=e.i?" !important":"";o+=`${e.p}:${e.v}${t};`}else{const t=e.v.trim();e.i?o+=t.endsWith(";")?t.slice(0,-1)+" !important;":`${t} !important;`:o+=t.endsWith(";")?t:`${t};`}})),o?`${e}{${o}}`:""},$=e=>"object"!=typeof e?"":[...new Set(e)].join(" "),I=window.wp.components,{AdvancedSettings:R,HeaderTabs:q,ColorControl:T,BackgroundControl:B,BorderControl:A,ResBoxControl:j,ResRangeControl:M,IconPickerControl:P,TypographyControl:O}=window.nexaModules,L=e=>{const{attributes:t,setAttributes:o}=e,{showLabel:l,label:u,isRequired:p,isRequiredMessage:f,showRequiredIcon:g,showIcon:y,icon:k,placeholderText:w,nx_labelColor:C,nx_symbolColor:E,nx_fieldColor:N,nx_fieldPlaceholderColor:S,nx_iconColor:$}=t,L={attributes:t,setAttributes:o,objAttributes:h};return(0,v.createElement)(_.InspectorControls,null,(0,v.createElement)(q,{generalControls:(0,v.createElement)(v.Fragment,null,(0,v.createElement)(I.PanelBody,{title:(0,n.__)("General","nexa-blocks"),initialOpen:!0},(0,v.createElement)(I.ToggleControl,{label:(0,n.__)("Show Label","nexa-blocks"),checked:l,onChange:()=>o({showLabel:!l})}),(0,v.createElement)(I.ToggleControl,{label:(0,n.__)("Is Required","nexa-blocks"),checked:p,onChange:()=>o({isRequired:!p})}),p&&(0,v.createElement)(I.ToggleControl,{label:(0,n.__)("Show Required Symbol","nexa-blocks"),checked:g,onChange:()=>o({showRequiredIcon:!g})}),(0,v.createElement)(I.ToggleControl,{label:(0,n.__)("Show Icon","nexa-blocks"),checked:y,onChange:()=>o({showIcon:!y})})),(0,v.createElement)(I.PanelBody,{title:(0,n.__)("Content","nexa-blocks"),initialOpen:!1},(0,v.createElement)(I.TextControl,{label:(0,n.__)("Label","nexa-blocks"),value:u,onChange:e=>o({label:e}),placeholder:(0,n.__)("label..","nexa-blocks")}),(0,v.createElement)(I.TextControl,{label:(0,n.__)("Placeholder","nexa-blocks"),value:w,onChange:e=>o({placeholderText:e}),placeholder:(0,n.__)("placeholder text","nexa-blocks")}),p&&(0,v.createElement)(I.TextControl,{label:(0,n.__)("Required Message","nexa-blocks"),value:f,onChange:e=>o({isRequiredMessage:e}),placeholder:(0,n.__)("This field is required.","nexa-blocks")}),y&&(0,v.createElement)(P,{label:(0,n.__)("Select Icon","nexa-blocks"),value:k,onChange:e=>{o({icon:e})}}))),styleControls:(0,v.createElement)(v.Fragment,null,l&&(0,v.createElement)(I.PanelBody,{title:(0,n.__)("Label","nexa-blocks"),initialOpen:!0},(0,v.createElement)(T,{label:(0,n.__)("Color","nexa-blocks"),color:C,onChange:e=>o({nx_labelColor:e})}),g&&(0,v.createElement)(T,{label:(0,n.__)("Symbol Color","nexa-blocks"),color:E,onChange:e=>o({nx_symbolColor:e})}),(0,v.createElement)(O,{label:(0,n.__)("Typography","nexa-blocks"),controlName:a,objAttrs:L}),(0,v.createElement)(j,{label:(0,n.__)("Margin","nexa-blocks"),controlName:r,objAttrs:L})),(0,v.createElement)(I.PanelBody,{title:(0,n.__)("Field","nexa-blocks"),initialOpen:!1},(0,v.createElement)(T,{label:(0,n.__)("Color","nexa-blocks"),color:N,onChange:e=>o({nx_fieldColor:e})}),(0,v.createElement)(T,{label:(0,n.__)("Placeholder Color","nexa-blocks"),color:S,onChange:e=>o({nx_fieldPlaceholderColor:e})}),(0,v.createElement)(O,{label:(0,n.__)("Typography","nexa-blocks"),controlName:s,objAttrs:L}),(0,v.createElement)(A,{controlName:i,objAttrs:L,noHover:!0}),(0,v.createElement)(j,{label:(0,n.__)("Border Radius","nexa-blocks"),controlName:c,objAttrs:L}),(0,v.createElement)(j,{label:(0,n.__)("Padding","nexa-blocks"),controlName:b,objAttrs:L}),(0,v.createElement)(j,{label:(0,n.__)("Margin","nexa-blocks"),controlName:d,objAttrs:L}),(0,v.createElement)(B,{label:(0,n.__)("Background","nexa-blocks"),controlName:m,objAttrs:L})),y&&(0,v.createElement)(I.PanelBody,{title:(0,n.__)("Icon","nexa-blocks"),initialOpen:!1},(0,v.createElement)(T,{label:(0,n.__)("Color","nexa-blocks"),color:$,onChange:e=>o({nx_iconColor:e})}),(0,v.createElement)(M,{label:(0,n.__)("Size","nexa-blocks"),controlName:x,objAttrs:L,min:10,max:100}))),advancedControls:(0,v.createElement)(v.Fragment,null,(0,v.createElement)(R,{attributes:t,setAttributes:o,objAttrs:L}))}))},{generateBorderStyles:F,generateResBoxStyles:D,generateBgStyles:z,generateRangeStyles:H,generateTypographyStyles:G,GlobalStyleHandler:W}=window.nexaModules,J=e=>{const{attributes:t,setAttributes:o}=e,{uniqueId:l,nx_labelColor:n,nx_symbolColor:u,nx_fieldColor:p,nx_fieldPlaceholderColor:f,nx_iconColor:g}=t,{desktopStyles:y,tabletStyles:h,mobileStyles:k}=G({controlName:a,attributes:t}),{boxDeskStyles:_,boxTabStyles:w,boxMobStyles:C}=D({controlName:r,attributes:t,propertyName:"margin",forRadius:!1}),{desktopStyles:E,tabletStyles:N,mobileStyles:$}=G({controlName:s,attributes:t}),{desktopStyles:I,tabletStyles:R,mobileStyles:q}=F({controlName:i,attributes:t}),{boxDeskStyles:T,boxTabStyles:B,boxMobStyles:A}=D({controlName:c,attributes:t,propertyName:"border-radius",forRadius:!0}),{boxDeskStyles:j,boxTabStyles:M,boxMobStyles:P}=D({controlName:b,attributes:t,propertyName:"padding",forRadius:!1}),{boxDeskStyles:O,boxTabStyles:L,boxMobStyles:J}=D({controlName:d,attributes:t,propertyName:"margin",forRadius:!1}),{bgStyle:V}=z({controlName:m,attributes:t}),{deskStyle:K,tabStyle:Q,mobStyle:U}=H({controlName:x,attributes:t,propertyName:"font-size"}),X=`\n        ${S(`.${l}.wp-block-nexa-text .form-field-label`,[{v:_}])}\n        ${S(`.${l}.wp-block-nexa-text .form-field-label .nexa-required`,[{p:"color",v:u}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-label`,[{p:"color",v:n},{v:y}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field`,[{v:O}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field .nexa-input`,[{p:"color",v:p},{v:E},{v:I},{v:T},{v:j},{v:V}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field .nexa-input::placeholder`,[{p:"color",v:f}])}\n        ${S(`.${l}.wp-block-nexa-text .form-icon i`,[{p:"color",v:g},{v:K}])}\n        \n    `,Y=`\n        ${S(`.${l}.wp-block-nexa-text .form-field-label`,[{v:w}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-label`,[{v:h}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field`,[{v:L}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field .nexa-input`,[{v:N},{v:R},{v:B},{v:M}])}\n        ${S(`.${l}.wp-block-nexa-text .form-icon i`,[{v:Q}])}\n    `,Z=`\n        ${S(`.${l}.wp-block-nexa-text .form-field-label`,[{v:C}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-label`,[{v:k}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field`,[{v:J}])}\n        ${S(`.${l}.wp-block-nexa-text .nexa-form-field .nexa-input`,[{v:$},{v:q},{v:A},{v:P}])}\n        ${S(`.${l}.wp-block-nexa-text .form-icon i`,[{v:U}])}\n    `;return(0,v.createElement)(W,{attributes:t,setAttributes:o,deskStyles:X,tabStyles:Y,mobStyles:Z})},{BlockIcons:V}=window?.nexaModules;(0,l.registerBlockType)(k,{icon:{src:V?.default.text},attributes:h,edit:e=>{const{attributes:t,setAttributes:o,clientId:l,isSelected:n,context:a}=e,{uniqueId:r,nexaId:s,parentClassess:i,preset:c,showLabel:b,label:d,isRequired:m,showRequiredIcon:x,showIcon:u,icon:p,placeholderText:f}=t;(0,w.useEffect)((()=>{(({uniqueId:e,setAttributes:t,clientId:o})=>{const l="nexa-blocks-"+Math.random().toString(36).substr(2,8);if(!e)return void t({uniqueId:l});const n=(0,N.select)("core/block-editor").getBlocks();let a=!1;const r=n=>{if(!a)for(const s of n){const{innerBlocks:n}=s;if(s.attributes.uniqueId===e){if(s.clientId!==o)return t({uniqueId:l}),void(a=!0);n.length>0&&r(n)}else n.length>0&&r(n)}};r(n)})({uniqueId:r,setAttributes:o,clientId:l})}),[]);const g=(0,_.useBlockProps)({className:E()(r,c,$(i),"form-group")});return(0,w.useEffect)((()=>{o({showIcon:a["nexa/showFormIcon"],showLabel:a["nexa/showLabel"]})}),[a]),(0,v.createElement)(w.Fragment,null,n&&(0,v.createElement)(L,{...e}),(0,v.createElement)(J,{...e}),(0,v.createElement)("div",{...g,...s&&{id:s}},(0,v.createElement)("div",{className:"nexa-form-item"},b&&(0,v.createElement)("div",{className:"form-field-label"},(0,v.createElement)("label",{className:"nexa-form-label"},d),m&&x&&(0,v.createElement)("span",{className:"nexa-required"},"*")),(0,v.createElement)("div",{className:"nexa-form-field"},u&&(0,v.createElement)("span",{className:"form-icon"},(0,v.createElement)("i",{className:p})),(0,v.createElement)("input",{type:"text",placeholder:f,name:d.toLowerCase()||"name",className:E()("nexa-input",{"has-icon":u})})))))},save:e=>{const{attributes:t}=e,{uniqueId:o,nexaId:l,preset:n,parentClassess:a,showLabel:r,label:s,isRequired:i,isRequiredMessage:c,showRequiredIcon:b,showIcon:d,icon:m,placeholderText:x}=t,u=_.useBlockProps.save({className:E()("wp-block-nexa-text",o,n,$(a),"form-group")});return(0,v.createElement)("div",{...u,...l&&{id:l}},(0,v.createElement)("div",{className:"nexa-form-item"},r&&(0,v.createElement)("div",{className:"form-field-label"},(0,v.createElement)("label",{className:"nexa-form-label",htmlFor:`nxf-${o}`},s),i&&b&&(0,v.createElement)("span",{className:"nexa-required"},"*")),(0,v.createElement)("div",{className:"nexa-form-field"},d&&(0,v.createElement)("span",{className:"form-icon"},(0,v.createElement)("i",{className:m})),(0,v.createElement)("input",{id:`nxf-${o}`,type:"text",placeholder:x,name:"name","data-label":s,className:E()("nexa-input",{"has-icon":d}),...i&&{required:!0,"data-pristine-required-message":c}}))))}})},6942:(e,t)=>{var o;!function(){"use strict";var l={}.hasOwnProperty;function n(){for(var e="",t=0;t<arguments.length;t++){var o=arguments[t];o&&(e=r(e,a(o)))}return e}function a(e){if("string"==typeof e||"number"==typeof e)return e;if("object"!=typeof e)return"";if(Array.isArray(e))return n.apply(null,e);if(e.toString!==Object.prototype.toString&&!e.toString.toString().includes("[native code]"))return e.toString();var t="";for(var o in e)l.call(e,o)&&e[o]&&(t=r(t,o));return t}function r(e,t){return t?e?e+" "+t:e+t:e}e.exports?(n.default=n,e.exports=n):void 0===(o=function(){return n}.apply(t,[]))||(e.exports=o)}()}},o={};function l(e){var n=o[e];if(void 0!==n)return n.exports;var a=o[e]={exports:{}};return t[e](a,a.exports,l),a.exports}l.m=t,e=[],l.O=(t,o,n,a)=>{if(!o){var r=1/0;for(b=0;b<e.length;b++){for(var[o,n,a]=e[b],s=!0,i=0;i<o.length;i++)(!1&a||r>=a)&&Object.keys(l.O).every((e=>l.O[e](o[i])))?o.splice(i--,1):(s=!1,a<r&&(r=a));if(s){e.splice(b--,1);var c=n();void 0!==c&&(t=c)}}return t}a=a||0;for(var b=e.length;b>0&&e[b-1][2]>a;b--)e[b]=e[b-1];e[b]=[o,n,a]},l.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return l.d(t,{a:t}),t},l.d=(e,t)=>{for(var o in t)l.o(t,o)&&!l.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},l.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={5648:0,5416:0};l.O.j=t=>0===e[t];var t=(t,o)=>{var n,a,[r,s,i]=o,c=0;if(r.some((t=>0!==e[t]))){for(n in s)l.o(s,n)&&(l.m[n]=s[n]);if(i)var b=i(l)}for(t&&t(o);c<r.length;c++)a=r[c],l.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return l.O(b)},o=globalThis.webpackChunknexa_blocks=globalThis.webpackChunknexa_blocks||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})();var n=l.O(void 0,[5416],(()=>l(966)));n=l.O(n)})();