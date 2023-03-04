(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[64],{

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-pithy-progress/lib/circle-progress.css":
/*!*************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-pithy-progress/lib/circle-progress.css ***!
  \*************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".a-circle-progress-wrapper .circle-progress{position:relative;display:flex;justify-content:center}.a-circle-progress-wrapper .circle-progress .circle-progress-bar{transform:rotate(-90deg)}.a-circle-progress-wrapper .circle-progress .progress-content{position:absolute;left:50%;transform:translateX(-50%)}.a-circle-progress-wrapper .circle-progress .progress-content .percent-text{height:100%;width:100%;display:flex;align-items:center;justify-content:center}", ""]);

// exports


/***/ }),

/***/ "./node_modules/es6-promise/auto.js":
/*!******************************************!*\
  !*** ./node_modules/es6-promise/auto.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
// This file can be required in Browserify and Node.js for automatic polyfill
// To use it:  require('es6-promise/auto');

module.exports = __webpack_require__(/*! ./ */ "./node_modules/es6-promise/dist/es6-promise.js").polyfill();


/***/ }),

/***/ "./node_modules/es6-promise/dist/es6-promise.js":
/*!******************************************************!*\
  !*** ./node_modules/es6-promise/dist/es6-promise.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(process, global) {/*!
 * @overview es6-promise - a tiny implementation of Promises/A+.
 * @copyright Copyright (c) 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors (Conversion to ES6 API by Jake Archibald)
 * @license   Licensed under MIT license
 *            See https://raw.githubusercontent.com/stefanpenner/es6-promise/master/LICENSE
 * @version   v4.2.8+1e68dce6
 */

(function (global, factory) {
	 true ? module.exports = factory() :
	undefined;
}(this, (function () { 'use strict';

function objectOrFunction(x) {
  var type = typeof x;
  return x !== null && (type === 'object' || type === 'function');
}

function isFunction(x) {
  return typeof x === 'function';
}



var _isArray = void 0;
if (Array.isArray) {
  _isArray = Array.isArray;
} else {
  _isArray = function (x) {
    return Object.prototype.toString.call(x) === '[object Array]';
  };
}

var isArray = _isArray;

var len = 0;
var vertxNext = void 0;
var customSchedulerFn = void 0;

var asap = function asap(callback, arg) {
  queue[len] = callback;
  queue[len + 1] = arg;
  len += 2;
  if (len === 2) {
    // If len is 2, that means that we need to schedule an async flush.
    // If additional callbacks are queued before the queue is flushed, they
    // will be processed by this flush that we are scheduling.
    if (customSchedulerFn) {
      customSchedulerFn(flush);
    } else {
      scheduleFlush();
    }
  }
};

function setScheduler(scheduleFn) {
  customSchedulerFn = scheduleFn;
}

function setAsap(asapFn) {
  asap = asapFn;
}

var browserWindow = typeof window !== 'undefined' ? window : undefined;
var browserGlobal = browserWindow || {};
var BrowserMutationObserver = browserGlobal.MutationObserver || browserGlobal.WebKitMutationObserver;
var isNode = typeof self === 'undefined' && typeof process !== 'undefined' && {}.toString.call(process) === '[object process]';

// test for web worker but not in IE10
var isWorker = typeof Uint8ClampedArray !== 'undefined' && typeof importScripts !== 'undefined' && typeof MessageChannel !== 'undefined';

// node
function useNextTick() {
  // node version 0.10.x displays a deprecation warning when nextTick is used recursively
  // see https://github.com/cujojs/when/issues/410 for details
  return function () {
    return process.nextTick(flush);
  };
}

// vertx
function useVertxTimer() {
  if (typeof vertxNext !== 'undefined') {
    return function () {
      vertxNext(flush);
    };
  }

  return useSetTimeout();
}

function useMutationObserver() {
  var iterations = 0;
  var observer = new BrowserMutationObserver(flush);
  var node = document.createTextNode('');
  observer.observe(node, { characterData: true });

  return function () {
    node.data = iterations = ++iterations % 2;
  };
}

// web worker
function useMessageChannel() {
  var channel = new MessageChannel();
  channel.port1.onmessage = flush;
  return function () {
    return channel.port2.postMessage(0);
  };
}

function useSetTimeout() {
  // Store setTimeout reference so es6-promise will be unaffected by
  // other code modifying setTimeout (like sinon.useFakeTimers())
  var globalSetTimeout = setTimeout;
  return function () {
    return globalSetTimeout(flush, 1);
  };
}

var queue = new Array(1000);
function flush() {
  for (var i = 0; i < len; i += 2) {
    var callback = queue[i];
    var arg = queue[i + 1];

    callback(arg);

    queue[i] = undefined;
    queue[i + 1] = undefined;
  }

  len = 0;
}

function attemptVertx() {
  try {
    var vertx = Function('return this')().require('vertx');
    vertxNext = vertx.runOnLoop || vertx.runOnContext;
    return useVertxTimer();
  } catch (e) {
    return useSetTimeout();
  }
}

var scheduleFlush = void 0;
// Decide what async method to use to triggering processing of queued callbacks:
if (isNode) {
  scheduleFlush = useNextTick();
} else if (BrowserMutationObserver) {
  scheduleFlush = useMutationObserver();
} else if (isWorker) {
  scheduleFlush = useMessageChannel();
} else if (browserWindow === undefined && "function" === 'function') {
  scheduleFlush = attemptVertx();
} else {
  scheduleFlush = useSetTimeout();
}

function then(onFulfillment, onRejection) {
  var parent = this;

  var child = new this.constructor(noop);

  if (child[PROMISE_ID] === undefined) {
    makePromise(child);
  }

  var _state = parent._state;


  if (_state) {
    var callback = arguments[_state - 1];
    asap(function () {
      return invokeCallback(_state, child, callback, parent._result);
    });
  } else {
    subscribe(parent, child, onFulfillment, onRejection);
  }

  return child;
}

/**
  `Promise.resolve` returns a promise that will become resolved with the
  passed `value`. It is shorthand for the following:

  ```javascript
  let promise = new Promise(function(resolve, reject){
    resolve(1);
  });

  promise.then(function(value){
    // value === 1
  });
  ```

  Instead of writing the above, your code now simply becomes the following:

  ```javascript
  let promise = Promise.resolve(1);

  promise.then(function(value){
    // value === 1
  });
  ```

  @method resolve
  @static
  @param {Any} value value that the returned promise will be resolved with
  Useful for tooling.
  @return {Promise} a promise that will become fulfilled with the given
  `value`
*/
function resolve$1(object) {
  /*jshint validthis:true */
  var Constructor = this;

  if (object && typeof object === 'object' && object.constructor === Constructor) {
    return object;
  }

  var promise = new Constructor(noop);
  resolve(promise, object);
  return promise;
}

var PROMISE_ID = Math.random().toString(36).substring(2);

function noop() {}

var PENDING = void 0;
var FULFILLED = 1;
var REJECTED = 2;

function selfFulfillment() {
  return new TypeError("You cannot resolve a promise with itself");
}

function cannotReturnOwn() {
  return new TypeError('A promises callback cannot return that same promise.');
}

function tryThen(then$$1, value, fulfillmentHandler, rejectionHandler) {
  try {
    then$$1.call(value, fulfillmentHandler, rejectionHandler);
  } catch (e) {
    return e;
  }
}

function handleForeignThenable(promise, thenable, then$$1) {
  asap(function (promise) {
    var sealed = false;
    var error = tryThen(then$$1, thenable, function (value) {
      if (sealed) {
        return;
      }
      sealed = true;
      if (thenable !== value) {
        resolve(promise, value);
      } else {
        fulfill(promise, value);
      }
    }, function (reason) {
      if (sealed) {
        return;
      }
      sealed = true;

      reject(promise, reason);
    }, 'Settle: ' + (promise._label || ' unknown promise'));

    if (!sealed && error) {
      sealed = true;
      reject(promise, error);
    }
  }, promise);
}

function handleOwnThenable(promise, thenable) {
  if (thenable._state === FULFILLED) {
    fulfill(promise, thenable._result);
  } else if (thenable._state === REJECTED) {
    reject(promise, thenable._result);
  } else {
    subscribe(thenable, undefined, function (value) {
      return resolve(promise, value);
    }, function (reason) {
      return reject(promise, reason);
    });
  }
}

function handleMaybeThenable(promise, maybeThenable, then$$1) {
  if (maybeThenable.constructor === promise.constructor && then$$1 === then && maybeThenable.constructor.resolve === resolve$1) {
    handleOwnThenable(promise, maybeThenable);
  } else {
    if (then$$1 === undefined) {
      fulfill(promise, maybeThenable);
    } else if (isFunction(then$$1)) {
      handleForeignThenable(promise, maybeThenable, then$$1);
    } else {
      fulfill(promise, maybeThenable);
    }
  }
}

function resolve(promise, value) {
  if (promise === value) {
    reject(promise, selfFulfillment());
  } else if (objectOrFunction(value)) {
    var then$$1 = void 0;
    try {
      then$$1 = value.then;
    } catch (error) {
      reject(promise, error);
      return;
    }
    handleMaybeThenable(promise, value, then$$1);
  } else {
    fulfill(promise, value);
  }
}

function publishRejection(promise) {
  if (promise._onerror) {
    promise._onerror(promise._result);
  }

  publish(promise);
}

function fulfill(promise, value) {
  if (promise._state !== PENDING) {
    return;
  }

  promise._result = value;
  promise._state = FULFILLED;

  if (promise._subscribers.length !== 0) {
    asap(publish, promise);
  }
}

function reject(promise, reason) {
  if (promise._state !== PENDING) {
    return;
  }
  promise._state = REJECTED;
  promise._result = reason;

  asap(publishRejection, promise);
}

function subscribe(parent, child, onFulfillment, onRejection) {
  var _subscribers = parent._subscribers;
  var length = _subscribers.length;


  parent._onerror = null;

  _subscribers[length] = child;
  _subscribers[length + FULFILLED] = onFulfillment;
  _subscribers[length + REJECTED] = onRejection;

  if (length === 0 && parent._state) {
    asap(publish, parent);
  }
}

function publish(promise) {
  var subscribers = promise._subscribers;
  var settled = promise._state;

  if (subscribers.length === 0) {
    return;
  }

  var child = void 0,
      callback = void 0,
      detail = promise._result;

  for (var i = 0; i < subscribers.length; i += 3) {
    child = subscribers[i];
    callback = subscribers[i + settled];

    if (child) {
      invokeCallback(settled, child, callback, detail);
    } else {
      callback(detail);
    }
  }

  promise._subscribers.length = 0;
}

function invokeCallback(settled, promise, callback, detail) {
  var hasCallback = isFunction(callback),
      value = void 0,
      error = void 0,
      succeeded = true;

  if (hasCallback) {
    try {
      value = callback(detail);
    } catch (e) {
      succeeded = false;
      error = e;
    }

    if (promise === value) {
      reject(promise, cannotReturnOwn());
      return;
    }
  } else {
    value = detail;
  }

  if (promise._state !== PENDING) {
    // noop
  } else if (hasCallback && succeeded) {
    resolve(promise, value);
  } else if (succeeded === false) {
    reject(promise, error);
  } else if (settled === FULFILLED) {
    fulfill(promise, value);
  } else if (settled === REJECTED) {
    reject(promise, value);
  }
}

function initializePromise(promise, resolver) {
  try {
    resolver(function resolvePromise(value) {
      resolve(promise, value);
    }, function rejectPromise(reason) {
      reject(promise, reason);
    });
  } catch (e) {
    reject(promise, e);
  }
}

var id = 0;
function nextId() {
  return id++;
}

function makePromise(promise) {
  promise[PROMISE_ID] = id++;
  promise._state = undefined;
  promise._result = undefined;
  promise._subscribers = [];
}

function validationError() {
  return new Error('Array Methods must be provided an Array');
}

var Enumerator = function () {
  function Enumerator(Constructor, input) {
    this._instanceConstructor = Constructor;
    this.promise = new Constructor(noop);

    if (!this.promise[PROMISE_ID]) {
      makePromise(this.promise);
    }

    if (isArray(input)) {
      this.length = input.length;
      this._remaining = input.length;

      this._result = new Array(this.length);

      if (this.length === 0) {
        fulfill(this.promise, this._result);
      } else {
        this.length = this.length || 0;
        this._enumerate(input);
        if (this._remaining === 0) {
          fulfill(this.promise, this._result);
        }
      }
    } else {
      reject(this.promise, validationError());
    }
  }

  Enumerator.prototype._enumerate = function _enumerate(input) {
    for (var i = 0; this._state === PENDING && i < input.length; i++) {
      this._eachEntry(input[i], i);
    }
  };

  Enumerator.prototype._eachEntry = function _eachEntry(entry, i) {
    var c = this._instanceConstructor;
    var resolve$$1 = c.resolve;


    if (resolve$$1 === resolve$1) {
      var _then = void 0;
      var error = void 0;
      var didError = false;
      try {
        _then = entry.then;
      } catch (e) {
        didError = true;
        error = e;
      }

      if (_then === then && entry._state !== PENDING) {
        this._settledAt(entry._state, i, entry._result);
      } else if (typeof _then !== 'function') {
        this._remaining--;
        this._result[i] = entry;
      } else if (c === Promise$1) {
        var promise = new c(noop);
        if (didError) {
          reject(promise, error);
        } else {
          handleMaybeThenable(promise, entry, _then);
        }
        this._willSettleAt(promise, i);
      } else {
        this._willSettleAt(new c(function (resolve$$1) {
          return resolve$$1(entry);
        }), i);
      }
    } else {
      this._willSettleAt(resolve$$1(entry), i);
    }
  };

  Enumerator.prototype._settledAt = function _settledAt(state, i, value) {
    var promise = this.promise;


    if (promise._state === PENDING) {
      this._remaining--;

      if (state === REJECTED) {
        reject(promise, value);
      } else {
        this._result[i] = value;
      }
    }

    if (this._remaining === 0) {
      fulfill(promise, this._result);
    }
  };

  Enumerator.prototype._willSettleAt = function _willSettleAt(promise, i) {
    var enumerator = this;

    subscribe(promise, undefined, function (value) {
      return enumerator._settledAt(FULFILLED, i, value);
    }, function (reason) {
      return enumerator._settledAt(REJECTED, i, reason);
    });
  };

  return Enumerator;
}();

/**
  `Promise.all` accepts an array of promises, and returns a new promise which
  is fulfilled with an array of fulfillment values for the passed promises, or
  rejected with the reason of the first passed promise to be rejected. It casts all
  elements of the passed iterable to promises as it runs this algorithm.

  Example:

  ```javascript
  let promise1 = resolve(1);
  let promise2 = resolve(2);
  let promise3 = resolve(3);
  let promises = [ promise1, promise2, promise3 ];

  Promise.all(promises).then(function(array){
    // The array here would be [ 1, 2, 3 ];
  });
  ```

  If any of the `promises` given to `all` are rejected, the first promise
  that is rejected will be given as an argument to the returned promises's
  rejection handler. For example:

  Example:

  ```javascript
  let promise1 = resolve(1);
  let promise2 = reject(new Error("2"));
  let promise3 = reject(new Error("3"));
  let promises = [ promise1, promise2, promise3 ];

  Promise.all(promises).then(function(array){
    // Code here never runs because there are rejected promises!
  }, function(error) {
    // error.message === "2"
  });
  ```

  @method all
  @static
  @param {Array} entries array of promises
  @param {String} label optional string for labeling the promise.
  Useful for tooling.
  @return {Promise} promise that is fulfilled when all `promises` have been
  fulfilled, or rejected if any of them become rejected.
  @static
*/
function all(entries) {
  return new Enumerator(this, entries).promise;
}

/**
  `Promise.race` returns a new promise which is settled in the same way as the
  first passed promise to settle.

  Example:

  ```javascript
  let promise1 = new Promise(function(resolve, reject){
    setTimeout(function(){
      resolve('promise 1');
    }, 200);
  });

  let promise2 = new Promise(function(resolve, reject){
    setTimeout(function(){
      resolve('promise 2');
    }, 100);
  });

  Promise.race([promise1, promise2]).then(function(result){
    // result === 'promise 2' because it was resolved before promise1
    // was resolved.
  });
  ```

  `Promise.race` is deterministic in that only the state of the first
  settled promise matters. For example, even if other promises given to the
  `promises` array argument are resolved, but the first settled promise has
  become rejected before the other promises became fulfilled, the returned
  promise will become rejected:

  ```javascript
  let promise1 = new Promise(function(resolve, reject){
    setTimeout(function(){
      resolve('promise 1');
    }, 200);
  });

  let promise2 = new Promise(function(resolve, reject){
    setTimeout(function(){
      reject(new Error('promise 2'));
    }, 100);
  });

  Promise.race([promise1, promise2]).then(function(result){
    // Code here never runs
  }, function(reason){
    // reason.message === 'promise 2' because promise 2 became rejected before
    // promise 1 became fulfilled
  });
  ```

  An example real-world use case is implementing timeouts:

  ```javascript
  Promise.race([ajax('foo.json'), timeout(5000)])
  ```

  @method race
  @static
  @param {Array} promises array of promises to observe
  Useful for tooling.
  @return {Promise} a promise which settles in the same way as the first passed
  promise to settle.
*/
function race(entries) {
  /*jshint validthis:true */
  var Constructor = this;

  if (!isArray(entries)) {
    return new Constructor(function (_, reject) {
      return reject(new TypeError('You must pass an array to race.'));
    });
  } else {
    return new Constructor(function (resolve, reject) {
      var length = entries.length;
      for (var i = 0; i < length; i++) {
        Constructor.resolve(entries[i]).then(resolve, reject);
      }
    });
  }
}

/**
  `Promise.reject` returns a promise rejected with the passed `reason`.
  It is shorthand for the following:

  ```javascript
  let promise = new Promise(function(resolve, reject){
    reject(new Error('WHOOPS'));
  });

  promise.then(function(value){
    // Code here doesn't run because the promise is rejected!
  }, function(reason){
    // reason.message === 'WHOOPS'
  });
  ```

  Instead of writing the above, your code now simply becomes the following:

  ```javascript
  let promise = Promise.reject(new Error('WHOOPS'));

  promise.then(function(value){
    // Code here doesn't run because the promise is rejected!
  }, function(reason){
    // reason.message === 'WHOOPS'
  });
  ```

  @method reject
  @static
  @param {Any} reason value that the returned promise will be rejected with.
  Useful for tooling.
  @return {Promise} a promise rejected with the given `reason`.
*/
function reject$1(reason) {
  /*jshint validthis:true */
  var Constructor = this;
  var promise = new Constructor(noop);
  reject(promise, reason);
  return promise;
}

function needsResolver() {
  throw new TypeError('You must pass a resolver function as the first argument to the promise constructor');
}

function needsNew() {
  throw new TypeError("Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function.");
}

/**
  Promise objects represent the eventual result of an asynchronous operation. The
  primary way of interacting with a promise is through its `then` method, which
  registers callbacks to receive either a promise's eventual value or the reason
  why the promise cannot be fulfilled.

  Terminology
  -----------

  - `promise` is an object or function with a `then` method whose behavior conforms to this specification.
  - `thenable` is an object or function that defines a `then` method.
  - `value` is any legal JavaScript value (including undefined, a thenable, or a promise).
  - `exception` is a value that is thrown using the throw statement.
  - `reason` is a value that indicates why a promise was rejected.
  - `settled` the final resting state of a promise, fulfilled or rejected.

  A promise can be in one of three states: pending, fulfilled, or rejected.

  Promises that are fulfilled have a fulfillment value and are in the fulfilled
  state.  Promises that are rejected have a rejection reason and are in the
  rejected state.  A fulfillment value is never a thenable.

  Promises can also be said to *resolve* a value.  If this value is also a
  promise, then the original promise's settled state will match the value's
  settled state.  So a promise that *resolves* a promise that rejects will
  itself reject, and a promise that *resolves* a promise that fulfills will
  itself fulfill.


  Basic Usage:
  ------------

  ```js
  let promise = new Promise(function(resolve, reject) {
    // on success
    resolve(value);

    // on failure
    reject(reason);
  });

  promise.then(function(value) {
    // on fulfillment
  }, function(reason) {
    // on rejection
  });
  ```

  Advanced Usage:
  ---------------

  Promises shine when abstracting away asynchronous interactions such as
  `XMLHttpRequest`s.

  ```js
  function getJSON(url) {
    return new Promise(function(resolve, reject){
      let xhr = new XMLHttpRequest();

      xhr.open('GET', url);
      xhr.onreadystatechange = handler;
      xhr.responseType = 'json';
      xhr.setRequestHeader('Accept', 'application/json');
      xhr.send();

      function handler() {
        if (this.readyState === this.DONE) {
          if (this.status === 200) {
            resolve(this.response);
          } else {
            reject(new Error('getJSON: `' + url + '` failed with status: [' + this.status + ']'));
          }
        }
      };
    });
  }

  getJSON('/posts.json').then(function(json) {
    // on fulfillment
  }, function(reason) {
    // on rejection
  });
  ```

  Unlike callbacks, promises are great composable primitives.

  ```js
  Promise.all([
    getJSON('/posts'),
    getJSON('/comments')
  ]).then(function(values){
    values[0] // => postsJSON
    values[1] // => commentsJSON

    return values;
  });
  ```

  @class Promise
  @param {Function} resolver
  Useful for tooling.
  @constructor
*/

var Promise$1 = function () {
  function Promise(resolver) {
    this[PROMISE_ID] = nextId();
    this._result = this._state = undefined;
    this._subscribers = [];

    if (noop !== resolver) {
      typeof resolver !== 'function' && needsResolver();
      this instanceof Promise ? initializePromise(this, resolver) : needsNew();
    }
  }

  /**
  The primary way of interacting with a promise is through its `then` method,
  which registers callbacks to receive either a promise's eventual value or the
  reason why the promise cannot be fulfilled.
   ```js
  findUser().then(function(user){
    // user is available
  }, function(reason){
    // user is unavailable, and you are given the reason why
  });
  ```
   Chaining
  --------
   The return value of `then` is itself a promise.  This second, 'downstream'
  promise is resolved with the return value of the first promise's fulfillment
  or rejection handler, or rejected if the handler throws an exception.
   ```js
  findUser().then(function (user) {
    return user.name;
  }, function (reason) {
    return 'default name';
  }).then(function (userName) {
    // If `findUser` fulfilled, `userName` will be the user's name, otherwise it
    // will be `'default name'`
  });
   findUser().then(function (user) {
    throw new Error('Found user, but still unhappy');
  }, function (reason) {
    throw new Error('`findUser` rejected and we're unhappy');
  }).then(function (value) {
    // never reached
  }, function (reason) {
    // if `findUser` fulfilled, `reason` will be 'Found user, but still unhappy'.
    // If `findUser` rejected, `reason` will be '`findUser` rejected and we're unhappy'.
  });
  ```
  If the downstream promise does not specify a rejection handler, rejection reasons will be propagated further downstream.
   ```js
  findUser().then(function (user) {
    throw new PedagogicalException('Upstream error');
  }).then(function (value) {
    // never reached
  }).then(function (value) {
    // never reached
  }, function (reason) {
    // The `PedgagocialException` is propagated all the way down to here
  });
  ```
   Assimilation
  ------------
   Sometimes the value you want to propagate to a downstream promise can only be
  retrieved asynchronously. This can be achieved by returning a promise in the
  fulfillment or rejection handler. The downstream promise will then be pending
  until the returned promise is settled. This is called *assimilation*.
   ```js
  findUser().then(function (user) {
    return findCommentsByAuthor(user);
  }).then(function (comments) {
    // The user's comments are now available
  });
  ```
   If the assimliated promise rejects, then the downstream promise will also reject.
   ```js
  findUser().then(function (user) {
    return findCommentsByAuthor(user);
  }).then(function (comments) {
    // If `findCommentsByAuthor` fulfills, we'll have the value here
  }, function (reason) {
    // If `findCommentsByAuthor` rejects, we'll have the reason here
  });
  ```
   Simple Example
  --------------
   Synchronous Example
   ```javascript
  let result;
   try {
    result = findResult();
    // success
  } catch(reason) {
    // failure
  }
  ```
   Errback Example
   ```js
  findResult(function(result, err){
    if (err) {
      // failure
    } else {
      // success
    }
  });
  ```
   Promise Example;
   ```javascript
  findResult().then(function(result){
    // success
  }, function(reason){
    // failure
  });
  ```
   Advanced Example
  --------------
   Synchronous Example
   ```javascript
  let author, books;
   try {
    author = findAuthor();
    books  = findBooksByAuthor(author);
    // success
  } catch(reason) {
    // failure
  }
  ```
   Errback Example
   ```js
   function foundBooks(books) {
   }
   function failure(reason) {
   }
   findAuthor(function(author, err){
    if (err) {
      failure(err);
      // failure
    } else {
      try {
        findBoooksByAuthor(author, function(books, err) {
          if (err) {
            failure(err);
          } else {
            try {
              foundBooks(books);
            } catch(reason) {
              failure(reason);
            }
          }
        });
      } catch(error) {
        failure(err);
      }
      // success
    }
  });
  ```
   Promise Example;
   ```javascript
  findAuthor().
    then(findBooksByAuthor).
    then(function(books){
      // found books
  }).catch(function(reason){
    // something went wrong
  });
  ```
   @method then
  @param {Function} onFulfilled
  @param {Function} onRejected
  Useful for tooling.
  @return {Promise}
  */

  /**
  `catch` is simply sugar for `then(undefined, onRejection)` which makes it the same
  as the catch block of a try/catch statement.
  ```js
  function findAuthor(){
  throw new Error('couldn't find that author');
  }
  // synchronous
  try {
  findAuthor();
  } catch(reason) {
  // something went wrong
  }
  // async with promises
  findAuthor().catch(function(reason){
  // something went wrong
  });
  ```
  @method catch
  @param {Function} onRejection
  Useful for tooling.
  @return {Promise}
  */


  Promise.prototype.catch = function _catch(onRejection) {
    return this.then(null, onRejection);
  };

  /**
    `finally` will be invoked regardless of the promise's fate just as native
    try/catch/finally behaves
  
    Synchronous example:
  
    ```js
    findAuthor() {
      if (Math.random() > 0.5) {
        throw new Error();
      }
      return new Author();
    }
  
    try {
      return findAuthor(); // succeed or fail
    } catch(error) {
      return findOtherAuther();
    } finally {
      // always runs
      // doesn't affect the return value
    }
    ```
  
    Asynchronous example:
  
    ```js
    findAuthor().catch(function(reason){
      return findOtherAuther();
    }).finally(function(){
      // author was either found, or not
    });
    ```
  
    @method finally
    @param {Function} callback
    @return {Promise}
  */


  Promise.prototype.finally = function _finally(callback) {
    var promise = this;
    var constructor = promise.constructor;

    if (isFunction(callback)) {
      return promise.then(function (value) {
        return constructor.resolve(callback()).then(function () {
          return value;
        });
      }, function (reason) {
        return constructor.resolve(callback()).then(function () {
          throw reason;
        });
      });
    }

    return promise.then(callback, callback);
  };

  return Promise;
}();

Promise$1.prototype.then = then;
Promise$1.all = all;
Promise$1.race = race;
Promise$1.resolve = resolve$1;
Promise$1.reject = reject$1;
Promise$1._setScheduler = setScheduler;
Promise$1._setAsap = setAsap;
Promise$1._asap = asap;

/*global self*/
function polyfill() {
  var local = void 0;

  if (typeof global !== 'undefined') {
    local = global;
  } else if (typeof self !== 'undefined') {
    local = self;
  } else {
    try {
      local = Function('return this')();
    } catch (e) {
      throw new Error('polyfill failed because global object is unavailable in this environment');
    }
  }

  var P = local.Promise;

  if (P) {
    var promiseToString = null;
    try {
      promiseToString = Object.prototype.toString.call(P.resolve());
    } catch (e) {
      // silently ignored
    }

    if (promiseToString === '[object Promise]' && !P.cast) {
      return;
    }
  }

  local.Promise = Promise$1;
}

// Strange compat..
Promise$1.polyfill = polyfill;
Promise$1.Promise = Promise$1;

return Promise$1;

})));



//# sourceMappingURL=es6-promise.map

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../process/browser.js */ "./node_modules/process/browser.js"), __webpack_require__(/*! ./../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/vue-pithy-progress/lib/circle-progress.css":
/*!*****************************************************************!*\
  !*** ./node_modules/vue-pithy-progress/lib/circle-progress.css ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../css-loader??ref--5-1!../../postcss-loader/src??ref--5-2!./circle-progress.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-pithy-progress/lib/circle-progress.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-pithy-progress/lib/circle-progress.umd.min.js":
/*!************************************************************************!*\
  !*** ./node_modules/vue-pithy-progress/lib/circle-progress.umd.min.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

(function(t,e){ true?module.exports=e():undefined})("undefined"!==typeof self?self:this,(function(){return function(t){var e={};function r(n){if(e[n])return e[n].exports;var o=e[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}return r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)r.d(n,o,function(e){return t[e]}.bind(null,o));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s="fb15")}({"06cf":function(t,e,r){var n=r("83ab"),o=r("d1e7"),c=r("5c6c"),i=r("fc6a"),u=r("c04e"),a=r("5135"),f=r("0cfb"),s=Object.getOwnPropertyDescriptor;e.f=n?s:function(t,e){if(t=i(t),e=u(e,!0),f)try{return s(t,e)}catch(r){}if(a(t,e))return c(!o.f.call(t,e),t[e])}},"0cfb":function(t,e,r){var n=r("83ab"),o=r("d039"),c=r("cc12");t.exports=!n&&!o((function(){return 7!=Object.defineProperty(c("div"),"a",{get:function(){return 7}}).a}))},"1aff":function(t,e,r){},"1be4":function(t,e,r){var n=r("d066");t.exports=n("document","documentElement")},"1d80":function(t,e){t.exports=function(t){if(void 0==t)throw TypeError("Can't call method on "+t);return t}},"1dde":function(t,e,r){var n=r("d039"),o=r("b622"),c=r("2d00"),i=o("species");t.exports=function(t){return c>=51||!n((function(){var e=[],r=e.constructor={};return r[i]=function(){return{foo:1}},1!==e[t](Boolean).foo}))}},"23cb":function(t,e,r){var n=r("a691"),o=Math.max,c=Math.min;t.exports=function(t,e){var r=n(t);return r<0?o(r+e,0):c(r,e)}},"23e7":function(t,e,r){var n=r("da84"),o=r("06cf").f,c=r("9112"),i=r("6eeb"),u=r("ce4e"),a=r("e893"),f=r("94ca");t.exports=function(t,e){var r,s,p,l,d,v,b=t.target,y=t.global,h=t.stat;if(s=y?n:h?n[b]||u(b,{}):(n[b]||{}).prototype,s)for(p in e){if(d=e[p],t.noTargetGet?(v=o(s,p),l=v&&v.value):l=s[p],r=f(y?p:b+(h?".":"#")+p,t.forced),!r&&void 0!==l){if(typeof d===typeof l)continue;a(d,l)}(t.sham||l&&l.sham)&&c(d,"sham",!0),i(s,p,d,t)}}},"241c":function(t,e,r){var n=r("ca84"),o=r("7839"),c=o.concat("length","prototype");e.f=Object.getOwnPropertyNames||function(t){return n(t,c)}},"2d00":function(t,e,r){var n,o,c=r("da84"),i=r("342f"),u=c.process,a=u&&u.versions,f=a&&a.v8;f?(n=f.split("."),o=n[0]+n[1]):i&&(n=i.match(/Edge\/(\d+)/),(!n||n[1]>=74)&&(n=i.match(/Chrome\/(\d+)/),n&&(o=n[1]))),t.exports=o&&+o},"342f":function(t,e,r){var n=r("d066");t.exports=n("navigator","userAgent")||""},"37e8":function(t,e,r){var n=r("83ab"),o=r("9bf2"),c=r("825a"),i=r("df75");t.exports=n?Object.defineProperties:function(t,e){c(t);var r,n=i(e),u=n.length,a=0;while(u>a)o.f(t,r=n[a++],e[r]);return t}},"3bbe":function(t,e,r){var n=r("861d");t.exports=function(t){if(!n(t)&&null!==t)throw TypeError("Can't set "+String(t)+" as a prototype");return t}},"428f":function(t,e,r){var n=r("da84");t.exports=n},"44ad":function(t,e,r){var n=r("d039"),o=r("c6b6"),c="".split;t.exports=n((function(){return!Object("z").propertyIsEnumerable(0)}))?function(t){return"String"==o(t)?c.call(t,""):Object(t)}:Object},4930:function(t,e,r){var n=r("d039");t.exports=!!Object.getOwnPropertySymbols&&!n((function(){return!String(Symbol())}))},"4d64":function(t,e,r){var n=r("fc6a"),o=r("50c4"),c=r("23cb"),i=function(t){return function(e,r,i){var u,a=n(e),f=o(a.length),s=c(i,f);if(t&&r!=r){while(f>s)if(u=a[s++],u!=u)return!0}else for(;f>s;s++)if((t||s in a)&&a[s]===r)return t||s||0;return!t&&-1}};t.exports={includes:i(!0),indexOf:i(!1)}},"50c4":function(t,e,r){var n=r("a691"),o=Math.min;t.exports=function(t){return t>0?o(n(t),9007199254740991):0}},5135:function(t,e){var r={}.hasOwnProperty;t.exports=function(t,e){return r.call(t,e)}},5692:function(t,e,r){var n=r("c430"),o=r("c6cd");(t.exports=function(t,e){return o[t]||(o[t]=void 0!==e?e:{})})("versions",[]).push({version:"3.6.5",mode:n?"pure":"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})},"56ef":function(t,e,r){var n=r("d066"),o=r("241c"),c=r("7418"),i=r("825a");t.exports=n("Reflect","ownKeys")||function(t){var e=o.f(i(t)),r=c.f;return r?e.concat(r(t)):e}},5899:function(t,e){t.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},"58a8":function(t,e,r){var n=r("1d80"),o=r("5899"),c="["+o+"]",i=RegExp("^"+c+c+"*"),u=RegExp(c+c+"*$"),a=function(t){return function(e){var r=String(n(e));return 1&t&&(r=r.replace(i,"")),2&t&&(r=r.replace(u,"")),r}};t.exports={start:a(1),end:a(2),trim:a(3)}},"5c6c":function(t,e){t.exports=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}}},"65f0":function(t,e,r){var n=r("861d"),o=r("e8b5"),c=r("b622"),i=c("species");t.exports=function(t,e){var r;return o(t)&&(r=t.constructor,"function"!=typeof r||r!==Array&&!o(r.prototype)?n(r)&&(r=r[i],null===r&&(r=void 0)):r=void 0),new(void 0===r?Array:r)(0===e?0:e)}},"69f3":function(t,e,r){var n,o,c,i=r("7f9a"),u=r("da84"),a=r("861d"),f=r("9112"),s=r("5135"),p=r("f772"),l=r("d012"),d=u.WeakMap,v=function(t){return c(t)?o(t):n(t,{})},b=function(t){return function(e){var r;if(!a(e)||(r=o(e)).type!==t)throw TypeError("Incompatible receiver, "+t+" required");return r}};if(i){var y=new d,h=y.get,g=y.has,m=y.set;n=function(t,e){return m.call(y,t,e),e},o=function(t){return h.call(y,t)||{}},c=function(t){return g.call(y,t)}}else{var x=p("state");l[x]=!0,n=function(t,e){return f(t,x,e),e},o=function(t){return s(t,x)?t[x]:{}},c=function(t){return s(t,x)}}t.exports={set:n,get:o,has:c,enforce:v,getterFor:b}},"6d7d":function(t,e,r){"use strict";var n=r("1aff"),o=r.n(n);o.a},"6eeb":function(t,e,r){var n=r("da84"),o=r("9112"),c=r("5135"),i=r("ce4e"),u=r("8925"),a=r("69f3"),f=a.get,s=a.enforce,p=String(String).split("String");(t.exports=function(t,e,r,u){var a=!!u&&!!u.unsafe,f=!!u&&!!u.enumerable,l=!!u&&!!u.noTargetGet;"function"==typeof r&&("string"!=typeof e||c(r,"name")||o(r,"name",e),s(r).source=p.join("string"==typeof e?e:"")),t!==n?(a?!l&&t[e]&&(f=!0):delete t[e],f?t[e]=r:o(t,e,r)):f?t[e]=r:i(e,r)})(Function.prototype,"toString",(function(){return"function"==typeof this&&f(this).source||u(this)}))},7156:function(t,e,r){var n=r("861d"),o=r("d2bb");t.exports=function(t,e,r){var c,i;return o&&"function"==typeof(c=e.constructor)&&c!==r&&n(i=c.prototype)&&i!==r.prototype&&o(t,i),t}},7418:function(t,e){e.f=Object.getOwnPropertySymbols},7839:function(t,e){t.exports=["constructor","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","toLocaleString","toString","valueOf"]},"7b0b":function(t,e,r){var n=r("1d80");t.exports=function(t){return Object(n(t))}},"7c73":function(t,e,r){var n,o=r("825a"),c=r("37e8"),i=r("7839"),u=r("d012"),a=r("1be4"),f=r("cc12"),s=r("f772"),p=">",l="<",d="prototype",v="script",b=s("IE_PROTO"),y=function(){},h=function(t){return l+v+p+t+l+"/"+v+p},g=function(t){t.write(h("")),t.close();var e=t.parentWindow.Object;return t=null,e},m=function(){var t,e=f("iframe"),r="java"+v+":";return e.style.display="none",a.appendChild(e),e.src=String(r),t=e.contentWindow.document,t.open(),t.write(h("document.F=Object")),t.close(),t.F},x=function(){try{n=document.domain&&new ActiveXObject("htmlfile")}catch(e){}x=n?g(n):m();var t=i.length;while(t--)delete x[d][i[t]];return x()};u[b]=!0,t.exports=Object.create||function(t,e){var r;return null!==t?(y[d]=o(t),r=new y,y[d]=null,r[b]=t):r=x(),void 0===e?r:c(r,e)}},"7f9a":function(t,e,r){var n=r("da84"),o=r("8925"),c=n.WeakMap;t.exports="function"===typeof c&&/native code/.test(o(c))},"825a":function(t,e,r){var n=r("861d");t.exports=function(t){if(!n(t))throw TypeError(String(t)+" is not an object");return t}},"83ab":function(t,e,r){var n=r("d039");t.exports=!n((function(){return 7!=Object.defineProperty({},1,{get:function(){return 7}})[1]}))},8418:function(t,e,r){"use strict";var n=r("c04e"),o=r("9bf2"),c=r("5c6c");t.exports=function(t,e,r){var i=n(e);i in t?o.f(t,i,c(0,r)):t[i]=r}},"861d":function(t,e){t.exports=function(t){return"object"===typeof t?null!==t:"function"===typeof t}},8875:function(t,e,r){var n,o,c;(function(r,i){o=[],n=i,c="function"===typeof n?n.apply(e,o):n,void 0===c||(t.exports=c)})("undefined"!==typeof self&&self,(function(){function t(){var e=Object.getOwnPropertyDescriptor(document,"currentScript");if(!e&&"currentScript"in document&&document.currentScript)return document.currentScript;if(e&&e.get!==t&&document.currentScript)return document.currentScript;try{throw new Error}catch(d){var r,n,o,c=/.*at [^(]*\((.*):(.+):(.+)\)$/gi,i=/@([^@]*):(\d+):(\d+)\s*$/gi,u=c.exec(d.stack)||i.exec(d.stack),a=u&&u[1]||!1,f=u&&u[2]||!1,s=document.location.href.replace(document.location.hash,""),p=document.getElementsByTagName("script");a===s&&(r=document.documentElement.outerHTML,n=new RegExp("(?:[^\\n]+?\\n){0,"+(f-2)+"}[^<]*<script>([\\d\\D]*?)<\\/script>[\\d\\D]*","i"),o=r.replace(n,"$1").trim());for(var l=0;l<p.length;l++){if("interactive"===p[l].readyState)return p[l];if(p[l].src===a)return p[l];if(a===s&&p[l].innerHTML&&p[l].innerHTML.trim()===o)return p[l]}return null}}return t}))},8925:function(t,e,r){var n=r("c6cd"),o=Function.toString;"function"!=typeof n.inspectSource&&(n.inspectSource=function(t){return o.call(t)}),t.exports=n.inspectSource},"90e3":function(t,e){var r=0,n=Math.random();t.exports=function(t){return"Symbol("+String(void 0===t?"":t)+")_"+(++r+n).toString(36)}},9112:function(t,e,r){var n=r("83ab"),o=r("9bf2"),c=r("5c6c");t.exports=n?function(t,e,r){return o.f(t,e,c(1,r))}:function(t,e,r){return t[e]=r,t}},"94ca":function(t,e,r){var n=r("d039"),o=/#|\.prototype\./,c=function(t,e){var r=u[i(t)];return r==f||r!=a&&("function"==typeof e?n(e):!!e)},i=c.normalize=function(t){return String(t).replace(o,".").toLowerCase()},u=c.data={},a=c.NATIVE="N",f=c.POLYFILL="P";t.exports=c},"99af":function(t,e,r){"use strict";var n=r("23e7"),o=r("d039"),c=r("e8b5"),i=r("861d"),u=r("7b0b"),a=r("50c4"),f=r("8418"),s=r("65f0"),p=r("1dde"),l=r("b622"),d=r("2d00"),v=l("isConcatSpreadable"),b=9007199254740991,y="Maximum allowed index exceeded",h=d>=51||!o((function(){var t=[];return t[v]=!1,t.concat()[0]!==t})),g=p("concat"),m=function(t){if(!i(t))return!1;var e=t[v];return void 0!==e?!!e:c(t)},x=!h||!g;n({target:"Array",proto:!0,forced:x},{concat:function(t){var e,r,n,o,c,i=u(this),p=s(i,0),l=0;for(e=-1,n=arguments.length;e<n;e++)if(c=-1===e?i:arguments[e],m(c)){if(o=a(c.length),l+o>b)throw TypeError(y);for(r=0;r<o;r++,l++)r in c&&f(p,l,c[r])}else{if(l>=b)throw TypeError(y);f(p,l++,c)}return p.length=l,p}})},"9bf2":function(t,e,r){var n=r("83ab"),o=r("0cfb"),c=r("825a"),i=r("c04e"),u=Object.defineProperty;e.f=n?u:function(t,e,r){if(c(t),e=i(e,!0),c(r),o)try{return u(t,e,r)}catch(n){}if("get"in r||"set"in r)throw TypeError("Accessors not supported");return"value"in r&&(t[e]=r.value),t}},a691:function(t,e){var r=Math.ceil,n=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?n:r)(t)}},a9e3:function(t,e,r){"use strict";var n=r("83ab"),o=r("da84"),c=r("94ca"),i=r("6eeb"),u=r("5135"),a=r("c6b6"),f=r("7156"),s=r("c04e"),p=r("d039"),l=r("7c73"),d=r("241c").f,v=r("06cf").f,b=r("9bf2").f,y=r("58a8").trim,h="Number",g=o[h],m=g.prototype,x=a(l(m))==h,S=function(t){var e,r,n,o,c,i,u,a,f=s(t,!1);if("string"==typeof f&&f.length>2)if(f=y(f),e=f.charCodeAt(0),43===e||45===e){if(r=f.charCodeAt(2),88===r||120===r)return NaN}else if(48===e){switch(f.charCodeAt(1)){case 66:case 98:n=2,o=49;break;case 79:case 111:n=8,o=55;break;default:return+f}for(c=f.slice(2),i=c.length,u=0;u<i;u++)if(a=c.charCodeAt(u),a<48||a>o)return NaN;return parseInt(c,n)}return+f};if(c(h,!g(" 0o1")||!g("0b1")||g("+0x1"))){for(var w,_=function(t){var e=arguments.length<1?0:t,r=this;return r instanceof _&&(x?p((function(){m.valueOf.call(r)})):a(r)!=h)?f(new g(S(e)),r,_):S(e)},O=n?d(g):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger".split(","),j=0;O.length>j;j++)u(g,w=O[j])&&!u(_,w)&&b(_,w,v(g,w));_.prototype=m,m.constructor=_,i(o,h,_)}},b622:function(t,e,r){var n=r("da84"),o=r("5692"),c=r("5135"),i=r("90e3"),u=r("4930"),a=r("fdbf"),f=o("wks"),s=n.Symbol,p=a?s:s&&s.withoutSetter||i;t.exports=function(t){return c(f,t)||(u&&c(s,t)?f[t]=s[t]:f[t]=p("Symbol."+t)),f[t]}},c04e:function(t,e,r){var n=r("861d");t.exports=function(t,e){if(!n(t))return t;var r,o;if(e&&"function"==typeof(r=t.toString)&&!n(o=r.call(t)))return o;if("function"==typeof(r=t.valueOf)&&!n(o=r.call(t)))return o;if(!e&&"function"==typeof(r=t.toString)&&!n(o=r.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},c430:function(t,e){t.exports=!1},c6b6:function(t,e){var r={}.toString;t.exports=function(t){return r.call(t).slice(8,-1)}},c6cd:function(t,e,r){var n=r("da84"),o=r("ce4e"),c="__core-js_shared__",i=n[c]||o(c,{});t.exports=i},c8ba:function(t,e){var r;r=function(){return this}();try{r=r||new Function("return this")()}catch(n){"object"===typeof window&&(r=window)}t.exports=r},ca84:function(t,e,r){var n=r("5135"),o=r("fc6a"),c=r("4d64").indexOf,i=r("d012");t.exports=function(t,e){var r,u=o(t),a=0,f=[];for(r in u)!n(i,r)&&n(u,r)&&f.push(r);while(e.length>a)n(u,r=e[a++])&&(~c(f,r)||f.push(r));return f}},cc12:function(t,e,r){var n=r("da84"),o=r("861d"),c=n.document,i=o(c)&&o(c.createElement);t.exports=function(t){return i?c.createElement(t):{}}},ce4e:function(t,e,r){var n=r("da84"),o=r("9112");t.exports=function(t,e){try{o(n,t,e)}catch(r){n[t]=e}return e}},d012:function(t,e){t.exports={}},d039:function(t,e){t.exports=function(t){try{return!!t()}catch(e){return!0}}},d066:function(t,e,r){var n=r("428f"),o=r("da84"),c=function(t){return"function"==typeof t?t:void 0};t.exports=function(t,e){return arguments.length<2?c(n[t])||c(o[t]):n[t]&&n[t][e]||o[t]&&o[t][e]}},d1e7:function(t,e,r){"use strict";var n={}.propertyIsEnumerable,o=Object.getOwnPropertyDescriptor,c=o&&!n.call({1:2},1);e.f=c?function(t){var e=o(this,t);return!!e&&e.enumerable}:n},d2bb:function(t,e,r){var n=r("825a"),o=r("3bbe");t.exports=Object.setPrototypeOf||("__proto__"in{}?function(){var t,e=!1,r={};try{t=Object.getOwnPropertyDescriptor(Object.prototype,"__proto__").set,t.call(r,[]),e=r instanceof Array}catch(c){}return function(r,c){return n(r),o(c),e?t.call(r,c):r.__proto__=c,r}}():void 0)},da84:function(t,e,r){(function(e){var r=function(t){return t&&t.Math==Math&&t};t.exports=r("object"==typeof globalThis&&globalThis)||r("object"==typeof window&&window)||r("object"==typeof self&&self)||r("object"==typeof e&&e)||Function("return this")()}).call(this,r("c8ba"))},df75:function(t,e,r){var n=r("ca84"),o=r("7839");t.exports=Object.keys||function(t){return n(t,o)}},e893:function(t,e,r){var n=r("5135"),o=r("56ef"),c=r("06cf"),i=r("9bf2");t.exports=function(t,e){for(var r=o(e),u=i.f,a=c.f,f=0;f<r.length;f++){var s=r[f];n(t,s)||u(t,s,a(e,s))}}},e8b5:function(t,e,r){var n=r("c6b6");t.exports=Array.isArray||function(t){return"Array"==n(t)}},f772:function(t,e,r){var n=r("5692"),o=r("90e3"),c=n("keys");t.exports=function(t){return c[t]||(c[t]=o(t))}},fb15:function(t,e,r){"use strict";if(r.r(e),"undefined"!==typeof window){var n=window.document.currentScript,o=r("8875");n=o(),"currentScript"in document||Object.defineProperty(document,"currentScript",{get:o});var c=n&&n.src.match(/(.+\/)[^/]+\.js(\?.*)?$/);c&&(r.p=c[1])}var i=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"a-circle-progress-wrapper"},[r("div",{staticClass:"circle-progress"},[r("svg",{staticClass:"circle-progress-bar",attrs:{width:2*t.r+t.strokeWidth,viewBox:t.viewBox,height:2*t.r+t.strokeWidth}},[r("circle",{attrs:{cx:t.r,cy:t.r,r:t.r,stroke:t.strokeBgColor,"stroke-width":t.strokeWidth,"stroke-linecap":t.strokeLinecap,fill:t.bgColor}}),r("circle",{style:t.aboveCircleStyle,attrs:{cx:t.r,cy:t.r,r:t.r,stroke:t.strokeColor,"stroke-dasharray":t.dasharray,"stroke-width":t.strokeWidth,"stroke-dashoffset":t.dashoffset,"stroke-linecap":t.strokeLinecap,fill:"none"}})]),r("div",{staticClass:"progress-content"},[t._t("default",[r("div",{staticClass:"percent-text"},[t._v(t._s(t.percentage)+"%")])])],2)])])},u=[],a=(r("99af"),r("a9e3"),{name:"circle-progress",data:function(){return{}},props:{percentage:{type:Number,default:10},r:{type:Number,default:50},strokeWidth:{type:Number,default:5},bgColor:{type:String,default:"#ffffff"},strokeBgColor:{type:String,default:"#ffcaca"},strokeColor:{type:String,default:"#e57d4b"},strokeLinecap:{type:String,default:"round"},duration:{type:Number,default:.3}},computed:{viewBox:function(){var t=this.strokeWidth/2,e=this.strokeWidth/2,r=2*this.r+this.strokeWidth,n=r;return"-".concat(t," -").concat(e," ").concat(r," ").concat(n)},dasharray:function(){var t=6.28*this.r;return"".concat(t)},dashoffset:function(){var t=this.dasharray*((this.percentage>100?100:this.percentage)/100)+3.14*this.r*2;return"".concat(-t)},aboveCircleStyle:function(){return{transition:"all ".concat(this.duration,"s ease-in-out")}}},methods:{}}),f=a;r("6d7d");function s(t,e,r,n,o,c,i,u){var a,f="function"===typeof t?t.options:t;if(e&&(f.render=e,f.staticRenderFns=r,f._compiled=!0),n&&(f.functional=!0),c&&(f._scopeId="data-v-"+c),i?(a=function(t){t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext,t||"undefined"===typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(i)},f._ssrRegister=a):o&&(a=u?function(){o.call(this,(f.functional?this.parent:this).$root.$options.shadowRoot)}:o),a)if(f.functional){f._injectStyles=a;var s=f.render;f.render=function(t,e){return a.call(e),s(t,e)}}else{var p=f.beforeCreate;f.beforeCreate=p?[].concat(p,a):[a]}return{exports:t,options:f}}var p=s(f,i,u,!1,null,null,null),l=p.exports;e["default"]=l},fc6a:function(t,e,r){var n=r("44ad"),o=r("1d80");t.exports=function(t){return n(o(t))}},fdbf:function(t,e,r){var n=r("4930");t.exports=n&&!Symbol.sham&&"symbol"==typeof Symbol.iterator}})["default"]}));
//# sourceMappingURL=circle-progress.umd.min.js.map

/***/ })

}]);