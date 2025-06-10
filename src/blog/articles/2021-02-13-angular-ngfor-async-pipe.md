{
"title" : "Using Observables with NgFor and the Async Pipe",
"author":"Mark Voorberg",
"tag":"Tutorial",
"category":"Software Development",
"meta-description": "Learn how to use Observables with Angular’s NgFor directive and the async pipe."
}

When you're working with Angular, it doesn't take long before you realize that's you need to embrace Observables for just about everything.

The simple examples with ngFor are going to demonstrate how it can iterate over an Array of Strings or Objects and render some bit of content for each. When that Array is encapsulated in an Observable this doesn't work anymore so we need a way to get the value out of the Observable so that we can use it to create the front-end for our application.

The easy way could be to simply subscribe to our Observable and pipe the values into an array that's available to our template. I won't go so far as to call it 'wrong' but it could be better. In this case better means that we don't need the additional Array variable containing another(!) copy of our data and we don't want to manage our subscriptions manually. Remember, that if we don't unsubscribe, we've created a memory-leak that will eventually come back to bite us.

The preferred way is to use an async pipe in our component template which means we aren't responsible for unsubscribing when the component is destroyed.

### Simple ngFor with an Array of Objects

Let's start with a baseline ngFor using an Array of dummy data. In the example, we're also getting the index if each item in the Array.

Here's the Typescript from our component:
```typescript
interface Bicycle {
  id: string;
  name: string;
  price: number;
}

const bikes: Bicycle[] = [
  { id: "123", name: "Norco", price: 698 },
  { id: "124", name: "Haro", price: 898 },
  { id: "125", name: "GT", price: 1299 },
];
```
...and the template:
```html
<ul>
  <li *ngFor="let bike of bikes; index as i;">
    {{ i+1 }}) {{ bike.id }} {{ bike.name }}
  </li>
</ul>
```
While our data is static this works pretty well, but once it becomes reactive (meaning asynchronous) this doesn't work anymore as the template may have already been rendered with an empty result set.

### Using ngFor with similar data from a reactive source

Let's create the same data and wrap it with an Observable. In a real scenario, this would most likely be the result of an HTTP request or fetch from an async data store. 

```typescript
// Using 'of()' to make our array Observable
// The $ in the variable name is a convention that 
// simply lets us know that it's an Observable.
const bikes$: Observable<Bicycle[]> = of([
  { id: "123", name: "Norco", price: 698 },
  { id: "124", name: "Haro", price: 898 },
  { id: "125", name: "GT", price: 1299 },
]);
```

```html
<ul>
  <li *ngFor="let bike of bikes$ | async; index as i">
    {{ i+1 }}) {{ bike.id }} {{ bike.name }}
  </li>
</ul>
```
The beautiful part here is that when the Observable resolves, the template will magically re-render itself with new data.

### What about when there's no data?

It's not uncommon, especially when pulling records from a database, to have a situation where there' no records that matched your request. In that case it would be nice to show some custom interface element that indicates there's no data to display.  In this example, we can do that easily by checking the length of the unwrapped Observable as well as only subscribing to it once.

```typescript
// With an empty array, our Obserable is still resolved asynchronously 
const bikes$: Observable<Bicycle[]> = of([]);
```

```html
<ng-container *ngIf="bikes$ | async as bikes">
  
  <div *ngIf="bikes.length === 0">
    Yes, we have no bicycles.
  </div>

  <ul>
    <li *ngFor="let bike of bikes; index as i">
      {{ i+1 }}) {{ bike.id }} {{ bike.name }}
    </li>
  </ul>

</ng-container>
```

### What if our observable is null or undefined?

Maybe your Observable depends on fetching some other async data before you can even make the request? In that case, we don't know how many rows there's going to be and we need to tell the user that we're still busy loading data. When this happens we can supply an alternate template that can be displayed instead of the ngFor results.

```typescript
// With an empty array, our Obserable is still resolved asynchronously 
const bikes$: Observable<Bicycle[]> = of([]);
```

```html
<ng-container *ngIf="bikes$ | async as bikes; else loadingBikes;">
  
  <ul>
    <li *ngFor="let bike of bikes; index as i">
      {{ i+1 }}) {{ bike.id }} {{ bike.name }}
    </li>
  </ul>

</ng-container>

<ng-template #loadingBikes>
  Hang tight, we're loading...
</ng-template>
```
Naturally, you need to make sure that the `loadingBikes` template is outside of the ngIf, so that it's in the page early in the lifecycle when we're going to need it most!

### Wrap-up
We've gone over the most common ways to use an `ngFor` in your Angular components. As you spend more time with Angular, you'll encounter these techniques over and over so that they become second nature. Using the Async pipe should definitely be your first choice when using async data in your component tempaltes to avoid manual subscriptions and the subscription cleanup that comes along with them. 




