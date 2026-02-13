# DESIGN - 系统设计与接口规范

## 1. 架构设计
### 1.1 密码重置逻辑
- **组件**：`reset_pwd.php` (临时脚本)
- **依赖**：`data/config.php` (获取数据库配置), `app/lib/class/sdcms_db.php` (数据库操作)
- **流程**：
  1. 引入系统核心文件。
  2. 实例化数据库类。
  3. 执行 `UPDATE sd_admin SET adminpass = md5('123456') WHERE adminname = 'admin'`。
  4. 输出执行结果。

### 1.2 页面统一设计
- **模板结构**：
  ```html
  {include file="head.php"}
  {include file="banner_inner.php"}
  <div class="p-berneck-profile">...</div>
  <div class="p-berneck-intro">...</div>
  {include file="foot.php"}
  ```
- **CSS 规范**：
  - `.p-berneck-ads img { object-fit: contain; }`
  - `.p-about-scale img { height: auto; max-height: 600px; }`

## 2. 异常处理
- **SQL 错误**：在 `classid=28` 页面加载前，检查 `sdcms_db.php` 抛出的错误日志，修复对应的 SQL 语法。
- **环境依赖**：若 SQLite 驱动不可用，将指导用户通过 FTP 覆盖数据库文件或使用 Web 端重置脚本。

## 3. 任务拆分 (Atomization 预览)
- Task 1: 创建并执行密码重置脚本。
- Task 2: 修复 `classid=28` 的 SQL 报错。
- Task 3: 检查并补全 `classid=2, 28` 的模板映射。
- Task 4: 统一所有指定 classid 的模板代码。
