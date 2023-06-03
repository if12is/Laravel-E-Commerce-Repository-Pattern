@extends('layouts.master')

@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <!-- View sales -->
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Congratulations John! 🎉</h5>
                                <p class="mb-2">Best seller of the month</p>
                                <h4 class="text-primary mb-1">$48.9k</h4>
                                <a href="javascript:;" class="btn btn-primary">View Sales</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../../assets/img/illustrations/card-advance-sale.png" height="140"
                                    alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View sales -->

            <!-- Statistics -->
            <div class="col-xl-8 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Statistics</h5>
                            <small class="text-muted">Updated 1 month ago</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">230k</h5>
                                        <small>Sales</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-users ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">8.549k</h5>
                                        <small>Customers</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">1.423k</h5>
                                        <small>Products</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">$9745</h5>
                                        <small>Revenue</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics -->

            <div class="col-xl-4 col-12">
                <div class="row">
                    <!-- Expenses -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0">82.5k</h5>
                                <small class="text-muted">Expenses</small>
                            </div>
                            <div class="card-body">
                                <div id="expensesChart"></div>
                                <div class="mt-md-2 text-center mt-lg-3 mt-3">
                                    <small class="text-muted mt-3">$21k Expenses more than last month</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Expenses -->

                    <!-- Profit last month -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0">Profit</h5>
                                <small class="text-muted">Last Month</small>
                            </div>
                            <div class="card-body">
                                <div id="profitLastMonth"></div>
                                <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                                    <h4 class="mb-0">624k</h4>
                                    <small class="text-success">+8.24%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Generated Leads -->
                    <div class="col-xl-12 mb-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <div class="card-title mb-auto">
                                            <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                                            <small>Monthly Report</small>
                                        </div>
                                        <div class="chart-statistics">
                                            <h3 class="card-title mb-1">4,350</h3>
                                            <small class="text-success text-nowrap fw-semibold"><i
                                                    class="ti ti-chevron-up me-1"></i> 15.8%</small>
                                        </div>
                                    </div>
                                    <div id="generatedLeadsChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Generated Leads -->
                </div>
            </div>

            <!-- Revenue Report -->
            <div class="col-12 col-xl-8 mb-4 col-lg-7">
                <div class="card">
                    <div class="card-header pb-3">
                        <h5 class="m-0 me-2 card-title">Revenue Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="row row-bordered g-0">
                            <div class="col-md-8">
                                <div id="totalRevenueChart"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center mt-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                            id="budgetId" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <script>
                                                document.write(new Date().getFullYear());
                                            </script>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                            <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                                <script>
                                                    document.write(new Date().getFullYear() - 1);
                                                </script>
                                            </a>
                                            <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                                <script>
                                                    document.write(new Date().getFullYear() - 2);
                                                </script>
                                            </a>
                                            <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                                <script>
                                                    document.write(new Date().getFullYear() - 3);
                                                </script>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-center pt-4 mb-0">$25,825</h3>
                                <p class="mb-4 text-center"><span class="fw-semibold">Budget: </span>56,800</p>
                                <div class="px-3">
                                    <div id="budgetChart"></div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-primary">Increase Button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue Report -->

            <!-- Earning Reports -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Earning Reports</h5>
                            <small class="text-muted">Weekly Earnings Overview</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 d-flex flex-column align-self-end">
                                <div class="d-flex gap-2 align-items-center mb-2 pb-1 flex-wrap">
                                    <h1 class="mb-0">$468</h1>
                                    <div class="badge rounded bg-label-success">+4.2%</div>
                                </div>
                                <small class="text-muted">You informed of this week compared to last week</small>
                            </div>
                            <div class="col-12 col-md-8">
                                <div id="weeklyEarningReports"></div>
                            </div>
                        </div>
                        <div class="border rounded p-3 mt-2">
                            <div class="row gap-4 gap-sm-0">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-primary p-1">
                                            <i class="ti ti-currency-dollar ti-sm"></i>
                                        </div>
                                        <h6 class="mb-0">Earnings</h6>
                                    </div>
                                    <h4 class="my-2 pt-1">$545.69</h4>
                                    <div class="progress w-75" style="height: 4px">
                                        <div class="progress-bar" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-info p-1"><i
                                                class="ti ti-chart-pie-2 ti-sm"></i>
                                        </div>
                                        <h6 class="mb-0">Profit</h6>
                                    </div>
                                    <h4 class="my-2 pt-1">$256.34</h4>
                                    <div class="progress w-75" style="height: 4px">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-danger p-1">
                                            <i class="ti ti-brand-paypal ti-sm"></i>
                                        </div>
                                        <h6 class="mb-0">Expense</h6>
                                    </div>
                                    <h4 class="my-2 pt-1">$74.19</h4>
                                    <div class="progress w-75" style="height: 4px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Earning Reports -->

            <!-- Support Tracker -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Support Tracker</h5>
                            <small class="text-muted">Last 7 Days</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                    <h1 class="mb-0">164</h1>
                                    <p class="mb-0">Total Tickets</p>
                                </div>
                                <ul class="p-0 m-0">
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                        <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">New Tickets</h6>
                                            <small class="text-muted">142</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                        <div class="badge rounded bg-label-info p-1">
                                            <i class="ti ti-circle-check ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                                            <small class="text-muted">28</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center pb-1">
                                        <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Response Time</h6>
                                            <small class="text-muted">1 Day</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                <div id="supportTracker"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Support Tracker -->
            <!-- Sales By Country -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Sales by Countries</h5>
                            <small class="text-muted">Monthly Sales Overview</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="salesByCountry" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountry">
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/us.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$8,567k</h6>
                                        </div>
                                        <small class="text-muted">United states</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold mb-0">
                                            <i class="ti ti-chevron-up"></i>
                                            25.8%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/br.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$2,415k</h6>
                                        </div>
                                        <small class="text-muted">Brazil</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-danger fw-semibold mb-0">
                                            <i class="ti ti-chevron-down"></i>
                                            6.2%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/in.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$865k</h6>
                                        </div>
                                        <small class="text-muted">India</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold">
                                            <i class="ti ti-chevron-up"></i>
                                            12.4%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/au.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$745k</h6>
                                        </div>
                                        <small class="text-muted">Australia</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-danger fw-semibold mb-0">
                                            <i class="ti ti-chevron-down"></i>
                                            11.9%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/fr.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$45</h6>
                                        </div>
                                        <small class="text-muted">France</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold mb-0">
                                            <i class="ti ti-chevron-up"></i>
                                            16.2%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <img src="../../assets/svg/flags/cn.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$12k</h6>
                                        </div>
                                        <small class="text-muted">China</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold mb-0">
                                            <i class="ti ti-chevron-up"></i>
                                            14.8%
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Sales By Country -->

            <!-- Total Earning -->
            <div class="col-12 col-xl-4 mb-4 col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-1">
                        <h5 class="mb-0 card-title">Total Earning</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="totalEarning" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarning">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h1 class="mb-0 me-2">87%</h1>
                            <i class="ti ti-chevron-up text-success me-1"></i>
                            <p class="text-success mb-0">25.8%</p>
                        </div>
                        <div id="totalEarningChart"></div>
                        <div class="d-flex align-items-start my-4">
                            <div class="badge rounded bg-label-primary p-2 me-3 rounded">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-0">Total Sales</h6>
                                    <small class="text-muted">Refund</small>
                                </div>
                                <p class="mb-0 text-success">+$98</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="badge rounded bg-label-secondary p-2 me-3 rounded">
                                <i class="ti ti-brand-paypal ti-sm"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-0">Total Revenue</h6>
                                    <small class="text-muted">Client Payment</small>
                                </div>
                                <p class="mb-0 text-success">+$126</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Earning -->

            <!-- Monthly Campaign State -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Monthly Campaign State</h5>
                            <small class="text-muted">8.52k Social Visiters</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="MonthlyCampaign" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                <div class="badge bg-label-success rounded p-2"><i class="ti ti-mail ti-sm"></i></div>
                                <div class="d-flex justify-content-between w-100 flex-wrap">
                                    <h6 class="mb-0 ms-3">Emails</h6>
                                    <div class="d-flex">
                                        <p class="mb-0 fw-semibold">12,346</p>
                                        <p class="ms-3 text-success mb-0">0.3%</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                <div class="badge bg-label-info rounded p-2"><i class="ti ti-link ti-sm"></i></div>
                                <div class="d-flex justify-content-between w-100 flex-wrap">
                                    <h6 class="mb-0 ms-3">Opened</h6>
                                    <div class="d-flex">
                                        <p class="mb-0 fw-semibold">8,734</p>
                                        <p class="ms-3 text-success mb-0">2.1%</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                <div class="badge bg-label-warning rounded p-2"><i class="ti ti-click ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap">
                                    <h6 class="mb-0 ms-3">Clicked</h6>
                                    <div class="d-flex">
                                        <p class="mb-0 fw-semibold">967</p>
                                        <p class="ms-3 text-success mb-0">1.4%</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                <div class="badge bg-label-primary rounded p-2"><i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap">
                                    <h6 class="mb-0 ms-3">Subscribe</h6>
                                    <div class="d-flex">
                                        <p class="mb-0 fw-semibold">345</p>
                                        <p class="ms-3 text-success mb-0">8.5k</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                <div class="badge bg-label-secondary rounded p-2">
                                    <i class="ti ti-alert-triangle ti-sm text-body"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap">
                                    <h6 class="mb-0 ms-3">Complaints</h6>
                                    <div class="d-flex">
                                        <p class="mb-0 fw-semibold">10</p>
                                        <p class="ms-3 text-success mb-0">1.5%</p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="badge bg-label-danger rounded p-2"><i class="ti ti-ban ti-sm"></i></div>
                                <div class="d-flex justify-content-between w-100 flex-wrap">
                                    <h6 class="mb-0 ms-3">Unsubscribe</h6>
                                    <div class="d-flex">
                                        <p class="mb-0 fw-semibold">86</p>
                                        <p class="ms-3 text-success mb-0">0.8%</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Monthly Campaign State -->
        </div>
    </div>
@endsection
