# Design Pattern with PHP

This repository has all my studies with design patterns.

## Behavioral Patterns

### Strategy
I used this pattern to solve the calculation a lot of taxes:

- [TaxCalculator](src/Taxes/TaxCalculator.php)
    - [ICMS](src/Taxes/ICMS.php)
    - [ISS](src/Taxes/ISS.php)

### Chain Of Resposibility
I used this pattern to solve the calculation of a lot of discounts scenarios:

- [DiscountCalculator](src/Discounts/DiscountCalculator.php)
    - [Discount](src/Discounts/Discount.php)
    - [DiscountToMoreThan5Items](src/Discounts/DiscountToMoreThan5Items.php)
    - [DiscountToValueHigherThan500](src/Discounts/DiscountToValueHigherThan500.php)
    - [NoDiscount](src/Discounts/NoDiscount.php)

### Template Method
I used this pattern to solve the calculation of taxes with different rates to the same tax:

- [TaxWith2TaxRates](src/Taxes/TaxWith2TaxRates.php)
    - [IOF](src/Taxes/IOF.php)
    - [IPI](src/Taxes/IPI.php)

### State
I used this pattern to solve the budget state:

- [Budget](src/Budgets/Budget.php)
    - [State](src/Budgets/States/State.php)
    - [Approved](src/Budgets/States/Approved.php)
    - [Disapproved](src/Budgets/States/Disapproved.php)
    - [Finished](src/Budgets/States/Finished.php)
    - [InApproval](src/Budgets/States/InApproval.php)

### Command
I used this pattern to encapsulate all business logic to generates a new order:

- [GeneratesOrderCommand](src/Orders/GeneratesOrder/GeneratesOrderCommand.php)
- [GeneratesOrderHandler](src/Orders/GeneratesOrder/GeneratesOrderHandler.php)

### Observer
I used this pattern to encapsulate all actions before generating a new order:

- [GeneratesOrderHandler](src/Orders/GeneratesOrder/GeneratesOrderHandler.php)
    - [SaveOrderOnDB](src/Orders/GeneratesOrder/Actions/SaveOrderOnDB.php)
    - [SendTheOrderByEmail](src/Orders/GeneratesOrder/Actions/SendTheOrderByEmail.php)
    - [GeneratesOrderLog](src/Orders/GeneratesOrder/Actions/GeneratesOrderLog.php)

### Iterator
I used this pattern to iterator about a budget list:

- [BudgetList](src/Budgets/BudgetList.php)

## Structural Patterns

### Adapter
I used this pattern to implement differents way to request external APIs:

- [RegistersBudget](src/Budgets/RegistersBudget.php)
    - [HttpAdapter](src/Budgets/Services/HttpAdapter.php)
    - [CurlHttpAdapter](src/Budgets/Services/CurlHttpAdapter.php)
    - [GuzzleHttpAdapter](src/Budgets/Services/GuzzleHttpAdapter.php)