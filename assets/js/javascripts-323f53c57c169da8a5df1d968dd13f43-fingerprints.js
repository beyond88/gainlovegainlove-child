window.FP={storageKey:'_user_fp',init(userId){const fpJs='https://res.cloudinary.com/dmajhtvmd/raw/upload/v1660037832/assets/javascripts/fp334.esm.min.js';let FpJS;const fpPromise=import(fpJs).then((FingerprintJS)=>{FpJS=FingerprintJS;return FingerprintJS.load();});return fpPromise.then((fp)=>fp.get()).then((result)=>{const extendedComponents={...result.components,userId:{value:userId}};return FpJS.hashComponents(extendedComponents);}).catch((e)=>{console.error(e)});},store(url,uuid){const storedUuid=localStorage.getItem(this.storageKey);if((storedUuid&&storedUuid!==uuid)||!storedUuid){this._send(url,uuid,storedUuid,()=>{localStorage.setItem(this.storageKey,uuid);});}},_send(url,uuid,prevUuid,successCallback){const xhr=new XMLHttpRequest();xhr.open('POST',url,true);xhr.setRequestHeader("Content-Type","application/json");xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');xhr.onreadystatechange=(e)=>{if(xhr.readyState===4){if(xhr.status===200){const resp=JSON.parse(xhr.responseText);if(resp.success){successCallback();}}else{console.error(e);}}};const data={uuid:uuid,prevUuid:prevUuid};xhr.send(JSON.stringify(data));}};window.FPLinksMarker={fpKey:"",isUserLoggedIn:false,mark(href){if(!this.fpKey){return[];}
try{const url=new URL(href);const urlParams=new URLSearchParams(url.search);const locationParams=new URLSearchParams(window.location.search);const storedUuid=localStorage.getItem(FP.storageKey);const params=[];let refCount=0;for(let[key,value]of locationParams.entries()){const keyMatch=key.match(new RegExp(`^${this.fpKey}(\\d*)`));if(keyMatch&&value!==storedUuid){refCount+=1;const keyCount=parseInt(keyMatch[1]);params.push(`${this.fpKey}${keyCount||''}=${value}`);}}
const currentFpKey=`${this.fpKey}${refCount===0?'':refCount+1}`;if(this.isUserLoggedIn&&storedUuid&&!urlParams.has(currentFpKey)){params.push(`${currentFpKey}=${storedUuid}`);}
return params;}catch(e){console.error(e.message);return[];}}}