(()=>{"use strict";var e,t={663:(e,t,r)=>{var o=r(609);const n=window.wp.blocks,l=JSON.parse('{"UU":"brandy/relative-posts"}'),a=window.wp.blockEditor,s=window.wp.element,i=window.wp.data,c=window.wp.compose,u=window.wp.components,d=window.wp.i18n,p=window.wp.primitives;var b=r(848);const _=(0,b.jsxs)(p.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:[(0,b.jsx)(p.Path,{d:"m19 7.5h-7.628c-.3089-.87389-1.1423-1.5-2.122-1.5-.97966 0-1.81309.62611-2.12197 1.5h-2.12803v1.5h2.12803c.30888.87389 1.14231 1.5 2.12197 1.5.9797 0 1.8131-.62611 2.122-1.5h7.628z"}),(0,b.jsx)(p.Path,{d:"m19 15h-2.128c-.3089-.8739-1.1423-1.5-2.122-1.5s-1.8131.6261-2.122 1.5h-7.628v1.5h7.628c.3089.8739 1.1423 1.5 2.122 1.5s1.8131-.6261 2.122-1.5h2.128z"})]});function m(e){const{setAttributes:t,attributes:r}=e,{query:n}=r,l=e=>t({query:{...n,...e}});return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(u.ToolbarGroup,null,(0,o.createElement)(u.Dropdown,{contentClassName:"block-library-query-toolbar__popover",renderToggle:({onToggle:e})=>(0,o.createElement)(u.ToolbarButton,{icon:_,label:(0,d.__)("Display settings"),onClick:e}),renderContent:()=>{var e,t;return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(u.__experimentalNumberControl,{__unstableInputWidth:"60px",className:"block-library-query-toolbar__popover-number-control",label:(0,d.__)("Items per Page"),labelPosition:"edge",min:1,max:100,onChange:e=>{isNaN(e)||e<1||e>100||l({perPage:e})},step:"1",value:null!==(e=n.perPage)&&void 0!==e?e:3,isDragEnabled:!1}),(0,o.createElement)(u.__experimentalNumberControl,{__unstableInputWidth:"60px",className:"block-library-query-toolbar__popover-number-control",label:(0,d.__)("Offset"),labelPosition:"edge",min:0,max:100,onChange:e=>{isNaN(e)||e<0||e>100||l({offset:e})},step:"1",value:null!==(t=n.offset)&&void 0!==t?t:0,isDragEnabled:!1}))}})))}const w=[{label:(0,d.__)("Categories"),value:"category"},{label:(0,d.__)("Tags"),value:"tag"}],v=[{label:(0,d.__)("Newest to oldest"),value:"date/desc"},{label:(0,d.__)("Oldest to newest"),value:"date/asc"},{label:(0,d.__)("A → Z"),value:"title/asc"},{label:(0,d.__)("Z → A"),value:"title/desc"}];function g({attributes:e,setAttributes:t}){const{query:r}=e,{order:n,orderBy:l,relatedBy:a}=r,s=e=>t({query:{...r,...e}});return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(u.PanelBody,{title:(0,d.__)("Settings")},(0,o.createElement)(u.SelectControl,{__nextHasNoMarginBottom:!0,__next40pxDefaultSize:!0,label:(0,d.__)("Related by"),value:null!=a?a:"category",options:w,onChange:e=>{s({relatedBy:e})}}),(0,o.createElement)(u.SelectControl,{__nextHasNoMarginBottom:!0,__next40pxDefaultSize:!0,label:(0,d.__)("Order by"),value:`${l}/${n}`,options:v,onChange:e=>{const[t,r]=e.split("/");s({order:r,orderBy:t})}})))}const y=[["brandy/post-template",{layout:{type:"grid",columnCount:3}}]];(0,n.registerBlockType)(l.UU,{edit:function e(t){const{attributes:r,setAttributes:n,clientId:l}=t,u=(0,a.useBlockProps)(),{__unstableMarkNextChangeAsNotPersistent:d}=(0,i.useDispatch)(a.store),p=(0,c.useInstanceId)(e),b=(0,a.useInnerBlocksProps)(u,{template:y}),{queryId:_,query:w}=r;return(0,s.useEffect)((()=>{Number.isFinite(_)||(d(),n({queryId:p}))}),[_,p]),(0,s.useEffect)((()=>{var e;const t=null!==(e=w.relatedBy)&&void 0!==e?e:"category",r={};if("tag"===t){const e=window.wp.data.select("core/editor").getEditedPostAttribute("tags");r.tagIds=e,r.categoryIds=[]}if("category"===t){const e=window.wp.data.select("core/editor").getEditedPostAttribute("categories");r.tagIds=[],r.categoryIds=e}const o=window.wp.data.select("core/editor").getCurrentPostId();r.exclude=[o],n({query:{...w,...r}})}),[w.relatedBy]),(0,o.createElement)(o.Fragment,null,(0,o.createElement)(a.InspectorControls,null,(0,o.createElement)(g,{setAttributes:n,attributes:r,clientId:l})),(0,o.createElement)(a.BlockControls,null,(0,o.createElement)(m,{clientId:l,attributes:r,setAttributes:n})),(0,o.createElement)("div",{...b}))},save:function(){const e=a.useBlockProps.save(),t=a.useInnerBlocksProps.save(e);return(0,o.createElement)("div",{...t})},icon:(0,o.createElement)("svg",{width:"25",height:"24",viewBox:"0 0 25 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},(0,o.createElement)("path",{d:"M8 9H16",stroke:"#0061FE","stroke-width":"1.5","stroke-linecap":"round"}),(0,o.createElement)("path",{d:"M8 12H16",stroke:"#0061FE","stroke-width":"1.5","stroke-linecap":"round"}),(0,o.createElement)("path",{d:"M8 15H12",stroke:"#0061FE","stroke-width":"1.5","stroke-linecap":"round"}),(0,o.createElement)("path",{d:"M16.5 3H8.5C5.7 3 3.5 5.2 3.5 8V15C3.5 17.8 5.7 20 8.5 20H10.5L12.5 22L14.5 20H16.5C19.3 20 21.5 17.8 21.5 15V8C21.5 5.2 19.3 3 16.5 3Z",stroke:"#0061FE","stroke-width":"1.5","stroke-linejoin":"round",fill:"transparent"}))})},20:(e,t,r)=>{var o=r(609),n=Symbol.for("react.element"),l=(Symbol.for("react.fragment"),Object.prototype.hasOwnProperty),a=o.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,s={key:!0,ref:!0,__self:!0,__source:!0};function i(e,t,r){var o,i={},c=null,u=null;for(o in void 0!==r&&(c=""+r),void 0!==t.key&&(c=""+t.key),void 0!==t.ref&&(u=t.ref),t)l.call(t,o)&&!s.hasOwnProperty(o)&&(i[o]=t[o]);if(e&&e.defaultProps)for(o in t=e.defaultProps)void 0===i[o]&&(i[o]=t[o]);return{$$typeof:n,type:e,key:c,ref:u,props:i,_owner:a.current}}t.jsx=i,t.jsxs=i},848:(e,t,r)=>{e.exports=r(20)},609:e=>{e.exports=window.React}},r={};function o(e){var n=r[e];if(void 0!==n)return n.exports;var l=r[e]={exports:{}};return t[e](l,l.exports,o),l.exports}o.m=t,e=[],o.O=(t,r,n,l)=>{if(!r){var a=1/0;for(u=0;u<e.length;u++){r=e[u][0],n=e[u][1],l=e[u][2];for(var s=!0,i=0;i<r.length;i++)(!1&l||a>=l)&&Object.keys(o.O).every((e=>o.O[e](r[i])))?r.splice(i--,1):(s=!1,l<a&&(a=l));if(s){e.splice(u--,1);var c=n();void 0!==c&&(t=c)}}return t}l=l||0;for(var u=e.length;u>0&&e[u-1][2]>l;u--)e[u]=e[u-1];e[u]=[r,n,l]},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={772:0,964:0};o.O.j=t=>0===e[t];var t=(t,r)=>{var n,l,a=r[0],s=r[1],i=r[2],c=0;if(a.some((t=>0!==e[t]))){for(n in s)o.o(s,n)&&(o.m[n]=s[n]);if(i)var u=i(o)}for(t&&t(r);c<a.length;c++)l=a[c],o.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return o.O(u)},r=self.webpackChunkbrandy_blocks=self.webpackChunkbrandy_blocks||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})();var n=o.O(void 0,[964],(()=>o(663)));n=o.O(n)})();