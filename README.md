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

### Bridge
I used this pattern to generate different reports in different formats easily:


- [ReportData](src/Reports/ReportData.php)
    - [BudgetReportData](src/Reports/Budget/BudgetReportData.php)
    - [OrderReportData](src/Reports/Order/OrderReportData.php)

- [ReportType](src/Reports/ReportType.php)
    - [XMLReportType](src/Reports/XMLReportType.php)
    - [ZipReportType](src/Reports/ZipReportType.php)

### Decorator
I used this pattern to calculate combined budget taxes:

- [TaxCalculator](src/Taxes/TaxCalculator.php)
    - [Tax](src/Taxes/Tax.php)
    - [ICMS](src/Taxes/ICMS.php)
    - [ISS](src/Taxes/ISS.php)
    - [TaxWith2TaxRates](src/Taxes/TaxWith2TaxRates.php)

### Composite
I used this pattern to combine items and other budgets in a new budget:

- [Budgetable](src/Budgets/Budgetable.php)
    - [Budget](src/Budgets/Budget.php)
    - [Item](src/Items/Item.php)

### Facade
I used this pattern to encapsulate all logic in the budget discount calculator:

- [DiscountCalculator](src/Discounts/DiscountCalculator.php)

### Proxy
I used this pattern to cached some values that take 1 second to return from an external request simulation.

- [Item](src/Items/Item.php)
- [ItemCacheProxy](src/Items/ItemCacheProxy.php)

### Flyweights
I used this pattern to optimize and reduce the quantity of RAM consumed:

- [OrderCreator](src/Orders/OrderCreator.php)
    - [OrderTemplate](src/Orders/OrderTemplate.php)
    - [Order](src/Orders/Order.php)

## Creational Patterns

### Factory Methods
I used this pattern to implement logs in different outputs:

- [LogWriter](src/Logs/LogWriter.php)
    - [StdoutLogWriter](src/Logs/StdoutLogWriter.php)
    - [FileLogWriter](src/Logs/FileLogWriter.php)

- [LogManager](src/Logs/LogManager.php)
    - [StdoutLogManager](src/Logs/StdoutLogManager.php)
    - [FileLogManager](src/Logs/FileLogManager.php)

### Abstract Factory
I used this pattern to receive specific tax to the specific sale type:

- [Sale](src/Sales/Sale.php)
    - [ProductSale](src/Sales/ProductSale.php)
    - [ServiceSale](src/Sales/ServiceSale.php)

- [SaleFactory](src/Sales/SaleFactory.php)
    - [ProductSaleFactory](src/Sales/ProductSaleFactory.php)
    - [ServiceSaleFactory](src/Sales/ServiceSaleFactory.php)

### Builder
I used this pattern to create spacific complex invoices classes:

- [Invoice](src/Invoices/Invoice.php)
    - [InvoiceBuilder](src/Invoices/InvoiceBuilder.php)
    - [ProductInvoiceBuilder](src/Invoices/ProductInvoiceBuilder.php)
    - [ServiceInvoiceBuilder](src/Invoices/ServiceInvoiceBuilder.php)

### Prototype
I used this pattern to create a new budget based on an older budget:

- [Budget](src/Budgets/Budget.php)

### Singleton
I used this pattern to create just one instance of the database connector:

- [PdoConnection](src/PdoConnection.php)
