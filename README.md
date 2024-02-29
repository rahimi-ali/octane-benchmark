# Octane Benchmark

All numbers are ratio of `fpm_without_opcache_mean / env_mean`, so higher is better.

## Ping (100req/s - 10s)

|      Environment       |      Score      |
|------------------------|-----------------|
|    FPM No OpCache      |        1        |
|   Octane With Swoole   |      1652       |
| Octane With OpenSwoole |      1418       |
| Octane With RoadRunner |       1383      |
| Octane With FrankenPHP |       0.15      |
|    FPM With OpCache    |       642       |


## Hash (50req/s - 10s)

|      Environment       |      Score      |
|------------------------|-----------------|
|    FPM No OpCache      |        1        |
|   Octane With Swoole   |      1.12       |
| Octane With OpenSwoole |      1.12       |
| Octane With RoadRunner |       1.11      |
| Octane With FrankenPHP |       1.09      |
|    FPM With OpCache    |       1.11      |

- None of the environments handled all the requests in the allowed `30sec` time.


## Products (400req/s - 10s) (MySQL read from a table with 1Mil rows)

|      Environment       |      Score      |
|------------------------|-----------------|
|    FPM No OpCache      |        1        |
|   Octane With Swoole   |      3781       |
| Octane With OpenSwoole |      3701       |
| Octane With RoadRunner |        96       |
| Octane With FrankenPHP |       0.8       |
|    FPM With OpCache    |       5.4       |

- FPM No OpCache did not handle all the requests in the allowed `30sec` time.
- Octane with FrankenPHP did not handle all the requests in the allowed `30sec` time.


## Order (100req/s - 10s) (MySQL read and write)

|      Environment       |      Score      |
|------------------------|-----------------|
|    FPM No OpCache      |        1        |
|   Octane With Swoole   |      1.62       |
| Octane With OpenSwoole |      1.57       |
| Octane With RoadRunner |       1.53      |
| Octane With FrankenPHP |       0.46      |
|    FPM With OpCache    |       1.69      |
